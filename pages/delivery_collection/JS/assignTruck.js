var truckData;
var deliveryData;
var addressData;
var suburbData;
var cityData;
var saleData;
var saleProductData;
var productData;
var truckSelectID=0;
var orgassignProductIDs=[];
var orgassignProductQtys=[];
var deliverySelectID=0; //SALE_ID
var truckProductData;
var deliveryTruckData;
///////////////////////////////////////////////////////////
function calculateRouteFromAtoB (platform,clickLat,clickLong) {
  let wayString=clickLat+","+clickLong;
  var router = platform.getRoutingService(),
    routeRequestParams = {
      mode: 'fastest;car',
      representation: 'display',
      routeattributes : 'waypoints,summary,shape,legs',
      maneuverattributes: 'direction,action',
      waypoint0: '-25.557606,27.698594', // Brandenburg Gate
      waypoint1: wayString  // Friedrichstraße Railway Station
    };


  router.calculateRoute(
    routeRequestParams,
    onSuccess,
    onError
  );
}
function onSuccess(result) {
  var route = result.response.route[0];
 /*
  * The styling of the route response on the map is entirely under the developer's control.
  * A representitive styling can be found the full JS + HTML code of this example
  * in the functions below:
  */
  addRouteShapeToMap(route);
  //addManueversToMap(route);

  addWaypointsToPanel(route.waypoint);
  addManueversToPanel(route);
  addSummaryToPanel(route.summary);
  // ... etc.
}
function onError(error) {
  alert('Can\'t reach the remote server');
}
var mapContainer = document.getElementById('map'),routeInstructionsContainer = document.getElementById('panel');
var bubble;
function openBubble(position, text){
 if(!bubble){
    bubble =  new H.ui.InfoBubble(
      position,
      // The FO property holds the province name.
      {content: text});
    ui.addBubble(bubble);
  } else {
    bubble.setPosition(position);
    bubble.setContent(text);
    bubble.open();
  }
}
function addRouteShapeToMap(route){
  var lineString = new H.geo.LineString(),
    routeShape = route.shape,
    polyline;

  routeShape.forEach(function(point) {
    var parts = point.split(',');
    lineString.pushLatLngAlt(parts[0], parts[1]);
  });

  polyline = new H.map.Polyline(lineString, {
    style: {
      lineWidth: 4,
      strokeColor: 'rgba(0, 128, 255, 0.7)'
    }
  });
  // Add the polyline to the map
  map.addObject(polyline);
  // And zoom to its bounding rectangle
  map.getViewModel().setLookAtData({
    bounds: polyline.getBoundingBox()
  });
}
function addManueversToMap(route){
  var svgMarkup = '',
    dotIcon = new H.map.Icon(svgMarkup, {anchor: {x:8, y:8}}),
    group = new  H.map.Group(),
    i,
    j;

  // Add a marker for each maneuver
  for (i = 0;  i < route.leg.length; i += 1) {
    for (j = 0;  j < route.leg[i].maneuver.length; j += 1) {
      // Get the next maneuver.
      maneuver = route.leg[i].maneuver[j];
      // Add a marker to the maneuvers group
      var marker =  new H.map.Marker({
        lat: maneuver.position.latitude,
        lng: maneuver.position.longitude} ,
        {icon: dotIcon});
      marker.instruction = maneuver.instruction;
      group.addObject(marker);
    }
  }

  group.addEventListener('tap', function (evt) {
    map.setCenter(evt.target.getGeometry());
    openBubble(
       evt.target.getGeometry(), evt.target.instruction);
  }, false);

  // Add the maneuvers group to the map
  map.addObject(group);
}
function addWaypointsToPanel(waypoints){



  var nodeH3 = document.createElement('h3'),
    waypointLabels = [],
    i;


   for (i = 0;  i < waypoints.length; i += 1) {
    waypointLabels.push(waypoints[i].label)
   }

   nodeH3.textContent = waypointLabels.join(' - ');

  routeInstructionsContainer.innerHTML = '';
  routeInstructionsContainer.appendChild(nodeH3);
}
function addSummaryToPanel(summary){
  var summaryDiv = document.createElement('div'),
   content = '';
   content += 'Total distance: ' + summary.distance  + 'm. ';
   content += 'Travel Time: ' + summary.travelTime.toMMSS() + ' (in current traffic)';


  summaryDiv.style.fontSize = 'small';
  summaryDiv.style.marginLeft ='5%';
  summaryDiv.style.marginRight ='5%';
  summaryDiv.innerHTML = content;
  routeInstructionsContainer.appendChild(summaryDiv);
}
function addManueversToPanel(route){



  var nodeOL = document.createElement('ol'),
    i,
    j;

  nodeOL.style.fontSize = 'small';
  nodeOL.style.marginLeft ='5%';
  nodeOL.style.marginRight ='5%';
  nodeOL.className = 'directions';

     // Add a marker for each maneuver
  for (i = 0;  i < route.leg.length; i += 1) {
    for (j = 0;  j < route.leg[i].maneuver.length; j += 1) {
      // Get the next maneuver.
      maneuver = route.leg[i].maneuver[j];

      var li = document.createElement('li'),
        spanArrow = document.createElement('span'),
        spanInstruction = document.createElement('span');

      spanArrow.className = 'arrow '  + maneuver.action;
      spanInstruction.innerHTML = maneuver.instruction;
      li.appendChild(spanArrow);
      li.appendChild(spanInstruction);

      nodeOL.appendChild(li);
    }
  }

  routeInstructionsContainer.appendChild(nodeOL);
}
Number.prototype.toMMSS = function () {
  return  Math.floor(this / 60)  +' minutes '+ (this % 60)  + ' seconds.';
}
///////////////////////////////////////////////////////////
function addMarkerToGroup(group, coordinate, html) {
  var marker = new H.map.Marker(coordinate);
  // add custom data to the marker
  marker.setData(html);
  group.addObject(marker);
}
function addInfoBubble(map,mapArr) {
  var group = new H.map.Group();

  map.addObject(group);

  // add 'tap' event listener, that opens info bubble, to the group
  group.addEventListener('tap', function (evt) {
    // event target is the marker itself, group is a parent event target
    // for all objects that it contains
    let bub =  new H.ui.InfoBubble(evt.target.getGeometry(), {
      // read custom data
      content: evt.target.getData()
    });
    // show info bubble
    ui.addBubble(bub);
  }, false);
  addMarkerToGroup(group,{lat:-25.557606,lng:27.698594},"Greens Supermarket Plot 80 Bethanie Road Brits 0250 South Africa")
  for(let k=0;k<mapArr.length;k++)
  {
    let address=addressData.find(function(element){
    	if(element["ADDRESS_ID"]==mapArr[k]["ADDRESS_ID"])
    	{
    		return element;
    	}
    })
    let addName=address["ADDRESS_LINE_1"]+", "+address["NAME"]+", "+address["ZIPCODE"]+", "+address["CITY_NAME"]+", South Africa";
    console.log(addName);
    addMarkerToGroup(group, {lat:mapArr[k]["LATITUDE"], lng:mapArr[k]["LONGITUDE"]},
    mapArr[k]["SALE_ID"]+": "+saleData[k]["NAME"]+" "+saleData[k]["SURNAME"]+" Address: "+addName);
  }


  // addMarkerToGroup(group, {lat:53.430, lng:-2.961},
  //   'Liverpool' +'Anfield Capacity: 45,362');

}
var platform = new H.service.Platform({
  apikey: "aIdEcQLgG65Si32sFD2jwHnyqd4sKfuRos3hBX37EIE"
});
var defaultLayers = platform.createDefaultLayers();
var map = new H.Map(document.getElementById('map'),
  defaultLayers.vector.normal.map,{
  center: {lat: -25.64235, lng: 27.78417},
  zoom: 7,
  pixelRatio: window.devicePixelRatio || 1
});
window.addEventListener('resize', () => map.getViewPort().resize());
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
var ui = H.ui.UI.createDefault(map, defaultLayers);
///////////////////////////////////////////////////////////

let buildTruck =function(tmp)
{
	let cardStart=$("<div></div>").addClass("card");
	let cardHeader=$("<div></div>").addClass("card-header bg secondary");
	let tButton=$("<button></button>").addClass("btn btn-link");
	tButton.attr("data-toggle","collapse");
	let collapseID="#collapse"+tmp;
	let ariacollapseID="collapse"+tmp;
	tButton.attr("data-target",collapseID);
	tButton.attr("aria-expanded",false);
	tButton.attr("aria-controls",ariacollapseID);
	let truckName=truckData[tmp]["REGISTRATION_NUMBER"]+"- "+truckData[tmp]["TRUCK_NAME"];
	let truckCap="Capacity: "+truckData[tmp]["CAPACITY"]+" Tonnes";
	tButton.append($("<h5></h5>").addClass("mb-0").text(truckName));
	tButton.append($("<h6></h6>").text(truckCap));
	let assignmentStatus=$("<span></span>");
	tButton.append($("<h6></h6>").append($("<i></i>").addClass("far fa-dot-circle text-warning")).append(assignmentStatus));
	//tButton.append($("<span></span>").text("Status: Empty"));
	let innerContainer=$("<div></div>").addClass("col-10");
	innerContainer.append(tButton);
	let Container=$("<div></div>").addClass("row").append(innerContainer);
	let innerContainer2=$("<div></div>").addClass("col-2 mt-2 radio");
	let radioName=truckData[tmp]["TRUCK_ID"];
	let radioInput=$("<input></input>").attr("type","radio");
	radioInput.addClass("classSourceUnchecked");
	radioInput.attr("name","TruckSelect");
	radioInput.attr("id",radioName);
	innerContainer2.append($("<label></label>").append(radioInput));
	Container.append(innerContainer2);
	cardHeader.append(Container);
	cardStart.append(cardHeader);
	Container2=$("<div></div>").addClass("collapse");
	Container2.attr("id",ariacollapseID);
	let cardBody=$("<div></div>").addClass("card-body");
	cardBody.append($("<p></p>").text("Item(s) Assigned :"));
	let divTable=$("<div></div>").addClass("table-responsive");
	let innerDiv=$("<div></div>");
	let table=$("<table></table>").addClass("table align-items-center").append("<thead class='thead-light'><tr><th scope='col'>DeliveryID#</th><th scope='col'>Product Name</th><th scope='col'>Quantity</th></tr></thead>");
	let tableBody=$("<tbody></tbody>").addClass("list");
	let bodyID="tB"+truckData[tmp]["TRUCK_ID"]; 
	let assignments=deliveryTruckData.filter(element=>element["TRUCK_ID"]==truckData[tmp]["TRUCK_ID"]&&element["DCT_STATUS_ID"]==2);
	console.log(assignments);
	if(assignments.length!=0)
	{
		assignmentStatus.text("Status: Packing");
	}
	else
	{
		assignmentStatus.text("Status: Empty");
	}
	for(let k=0;k<assignments.length;k++)
	{
		let assignmentProducts=truckProductData.filter(element=>element["DELIVERY_TRUCK_ID"]==assignments[k]["DELIVERY_TRUCK_ID"]);
		console.log(assignmentProducts);
		for(let m=0;m<assignmentProducts.length;m++)
		{
			let product=productData.find(function(element){
				if(element["PRODUCT_ID"]==assignmentProducts[m]["PRODUCT_ID"])
				{
					return element;
				}
			});
			let pType="Individual";
			let pNumber="";
			if(product["PRODUCT_SIZE_TYPE"]==2)
			{
				pType="Case";
				pNumber=product["UNITS_PER_CASE"];
			}
			else if(product["PRODUCT_SIZE_TYPE"]==3)
			{
				pType="Pallet";
				pNumber=product["CASES_PER_PALLET"];
			}
			let truckProductName=product["NAME"]+" ("+pNumber+" x "+product["PRODUCT_MEASUREMENT"]+product["PRODUCT_MEASUREMENT_UNIT"]+")"+" "+pType;
			let entry=buildTruckProducts(assignments[k]["DELIVERY_ID"],truckProductName,assignmentProducts[m]["QUANTITY"]);
			console.log(entry);
			tableBody.append(entry);
		}

	}
	tableBody.attr("id",bodyID);
	table.append(tableBody);
	innerDiv.append(table);
	divTable.append(innerDiv);
	cardBody.append(divTable);
	Container2.append(cardBody);
	cardStart.append(Container2);
	$("#accordion").append(cardStart);

}

let buildTruckProducts=function(dtid,productname,qty)
{
	let TruckProductEntry=$("<tr></tr>");
	let TruckProductID=$("<td></td>").text(dtid);
	let TruckProductName=$("<td></td>").text(productname);
	let TruckProductQty=$("<td></td>").text(qty);
	TruckProductEntry.append(TruckProductID);
	TruckProductEntry.append(TruckProductName);
	TruckProductEntry.append(TruckProductQty);
	return TruckProductEntry;
}

let buildProducts=function(tmp,arr)
{
	let tableEntry=$("<tr></tr>");
	let quantityEntry=$("<td></td>").addClass("py-2 px-0");
	let innerDivP=$("<div></div>").addClass("input-group mx-auto");
	innerDivP.css("width","4rem");
	let inputQuantity=$("<input type='number' min='1' step='1' data-number-to-fixed='00.10' data-number-step-factor='1'></input>").addClass("form-control currency pr-0 quantityBox");
	inputQuantity.css("height","2rem");
	inputQuantity.attr("max",arr[tmp]["QUANTITY_ASSIGNED"]);
	inputQuantity.attr("name",arr[tmp]["PRODUCT_ID"]);
	inputQuantity.val(arr[tmp]["QUANTITY_ASSIGNED"]);
	innerDivP.append(inputQuantity);
	quantityEntry.append(innerDivP);
	tableEntry.append(quantityEntry);
	let nameEntry=$("<td></td>");
	let product=productData.find(function(element){
			if(element["PRODUCT_ID"]==arr[tmp]["PRODUCT_ID"])
			{
				return element;
			}
	});
	let pType="Individual";
	let pNumber="";
	if(product["PRODUCT_SIZE_TYPE"]==2)
	{
		pType="Case";
		pNumber=product["UNITS_PER_CASE"];
	}
	else if(product["PRODUCT_SIZE_TYPE"]==3)
	{
		pType="Pallet";
		pNumber=product["CASES_PER_PALLET"];
	}
	let productName=product["NAME"]+" ("+pNumber+" x "+product["PRODUCT_MEASUREMENT"]+product["PRODUCT_MEASUREMENT_UNIT"]+")"+" "+pType;
	nameEntry.text(productName);
	tableEntry.append(nameEntry);
	$("#enterProducts").append(tableEntry);
}

let buildDeliveries=function(tmp)
{
	let tableEntry=$("<tr></tr>");
	let tableInnerButton=$("<button></button>").addClass("btn btn-sm btn-warning").text("Select");
	tableInnerButton.attr("name",deliveryData[tmp]["SALE_ID"]);
	tableInnerButton.on('click',function(e){
		e.preventDefault();
		let specificLat=deliveryData[tmp]["LATITUDE"];
		let specificLong=deliveryData[tmp]["LONGITUDE"];
		calculateRouteFromAtoB(platform,specificLat,specificLong);
		let specificSaleProducts=saleProductData.filter(element=>element["SALE_ID"]==deliveryData[tmp]["SALE_ID"]);
		console.log(specificSaleProducts);
		deliverySelectID=$(this).attr("name");
		$("#enterProducts").html('');
		for(let k=0;k<specificSaleProducts.length;k++)
		{
			buildProducts(k,specificSaleProducts);
		}

		$("#enterProducts input").each(function()
		{
			orgassignProductIDs.push($(this).attr("name"));
			orgassignProductQtys.push($(this).val())
		});
		console.log(orgassignProductQtys);
		console.log(orgassignProductIDs);

	});
	let tableButton=$("<td></td>").append(tableInnerButton);
	let saleEntry=$("<td></td>").text(deliveryData[tmp]["SALE_ID"]);
	let dateEntry=$("<td></td>").text(deliveryData[tmp]["EXPECTED_DATE"]);
	let address=addressData.find(function(element){
		if(element["ADDRESS_ID"]==deliveryData[tmp]["ADDRESS_ID"])
		{
			return element;
		}
	});
	let cityEntry=$("<td></td>").text(address["CITY_NAME"]);
	tableEntry.append(tableButton);
	tableEntry.append(saleEntry);
	tableEntry.append(dateEntry);
	tableEntry.append(cityEntry);
	$("#dBody").append(tableEntry);
}

let uncheckSource = function()
{
	$(".classSourceUnchecked").each(function(){
		console.log("here");
		$(this).prop("checked",false);
		$(this).removeClass("classSourceChecked");
		$(this).addClass("classSourceUnchecked");
	})
}

$(()=>{
	truckData=JSON.parse($("#tData").text());
	deliveryData=JSON.parse($("#dData").text());
	addressData=JSON.parse($("#aData").text());
	// suburbData=JSON.parse($("#subData").text());
	// cityData=JSON.parse($("#citData").text());
	saleData=JSON.parse($("#sData").text());
	saleProductData=JSON.parse($("#spData").text());
	productData=JSON.parse($("#pData").text());
	truckProductData=JSON.parse($("#tpData").text());
	deliveryTruckData=JSON.parse($("#dtData").text());
	if(truckProductData==false)
	{
		truckProductData=[];
	}
	if(deliveryTruckData==false)
	{
		deliveryTruckData=[];
	}
	console.log(deliveryData);
	addInfoBubble(map,deliveryData);
	for(let k=0;k<truckData.length;k++)
	{
		buildTruck(k);
	}
	$(document).on('click','input.classSourceUnchecked:radio',function(e){
		//uncheckSource();
		$(this).prop("checked",true);
		$(this).removeClass("classSourceUnchecked");
		$(this).addClass("classSourceChecked");
		truckSelectID=$(this).attr("id");
		console.log(truckSelectID);

	});
	for(let k=0;k<deliveryData.length;k++)
	{
		buildDeliveries(k);
	}
	$("#btnAssign").on('click',function(e)
	{
		let assignProductIDs=[];
		let assignProductQtys=[];
		
		$("#enterProducts input").each(function()
		{
			assignProductIDs.push($(this).attr("name"));
			assignProductQtys.push($(this).val())
		});
		let delID=deliveryData.find(function(element){
			if(deliverySelectID==element["SALE_ID"])
			{
				return element;
			}
		});
		$.ajax({
			url:'PHPcode/assigncode.php',
			type:'POST',
			data:{choice:1,num:assignProductIDs.length,SALE_ID:deliverySelectID,PRODUCT_ID:assignProductIDs,QTY:assignProductQtys},
			beforeSend:function(){
				$("#loadImage").show();
			}
		})
		.done(data=>{
			console.log(data);
			$.ajax({
			url:'PHPcode/assigncode.php',
			type:'POST',
			data:{choice:2,DELIVERY_ID:delID["DELIVERY_ID"],num:assignProductIDs.length,SALE_ID:deliverySelectID,PRODUCT_ID:assignProductIDs,QTY:assignProductQtys,TRUCK_ID:truckSelectID},
			complete:function()
			{
				$("#loadImage").hide();
			}
			})
			.done(data=>{
				console.log(data);
				location.reload();

			});
			
		});
	});


});

//aria-labelledby="headingOne" data-parent="#accordion"