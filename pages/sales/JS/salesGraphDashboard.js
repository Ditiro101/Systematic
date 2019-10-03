$(()=>{
    
        var salePeriod = "Weekly";
        //var dateTo = $('#dateTo').text().trim();
        let tableHeader;
        console.log(salePeriod);
        if(salePeriod=="Weekly")
        {
            $("#PeriodAttr").text("SALES FOR THE WEEK");
                tableHeader = "SALES FOR THE WEEK";
        }   
        if(salePeriod=="Monthly")
        {
            $("#PeriodAttr").text("DAYS OF THE MONTH");
            tableHeader = "SALES FOR A MONTH";
        
        }   
        if(salePeriod=="Daily")
        {
            $("#PeriodAttr").text("DAY");
            tableHeader = "SALES FOR A DAY";
    
        }  
        //console.log(dateTo);
    
        $.ajax({
            url: 'pages/sales/PHPcode/salesGraphDashboard.php',
            type: 'POST',
            data: {SALEPERIOD:salePeriod} 
        })
        .done(data=>{
            
            if(data!="False")
            {
                console.log(data);
                let arr=JSON.parse(data);
                console.log(arr);


                console.log(arr[0]["SALE_DATE"]);
                console.log( moment(arr[0]["SALE_DATE"]).format('dddd'));
                let tableEntries="";
                let formView="";
                let totalSales = 0;
                //[1, 2, 3, 4].reduce((a, b) => a + b, 0)
                let saleTotalArray=[];
                let daysOfTheWeek;
                let previousDay;
                let staticTotalSales = 0;
                let futureDay;
                let arrLength = arr.length;
                console.log(arrLength);

                let saleGraphDays = [];

             
                var formattedTime;
                let saleDates = [];
               if(arr != "Empty")
               {
                    for(let k=0;k<arr.length;k++)
                    {
                        daysOfTheWeek= arr[k]["SALE_DATE"];
                       saleDates.push(daysOfTheWeek);
                    
                        
                         
                        totalSales = arr[k]["TOTAL_SALES"];
                        console.log(totalSales);
                        formattedTime = daysOfTheWeek;
                        staticTotalSales =  parseFloat(arr[k]["SALE_AMOUNT"]);
                        saleTotalArray.push(parseFloat(arr[k]["SALE_AMOUNT"]).toFixed(2));
                        if(salePeriod=="Weekly"  || salePeriod == "Daily")
                        {
                            formattedTime = moment(daysOfTheWeek).format('dddd');
                        }
                        saleGraphDays.push(formattedTime);
                        
                            tableEntries+="<tr><td class='no'>"+formattedTime+"</td><td class='desc' id='TotalSales'>"+totalSales +"</td><td class='unit-right' id='SaleTotal'>"+staticTotalSales.toFixed(2)+"</td></tr>";
                            


                        
                    
                    }
                

            
                
               // $("#tBody").append(tableEntries);
             


               //Display Graph
                console.log(saleGraphDays);
                saleTotalArray.reverse();
                console.log(saleTotalArray);
                saleDates.reverse();
                console.log(saleDates);
                var day = new Date();

               
                var prevDay = new Date(day);
                prevDay.setDate(day.getDate());
                let comDate;
                comDate = prevDay.getFullYear()+'-'+(prevDay.getMonth()+1)+'-'+(prevDay.getDate());
                console.log(comDate);
                let newWeek = [];
                let count = 0;
                day = prevDay;
                let tempSaleArray = [];
                if(salePeriod=="Weekly" || salePeriod=="Daily")
                {

                    if(salePeriod=="Weekly")
                    {
                        while(count <7)
                        {
        
                           if(comDate==saleDates[count])
                           {
                                formattedTime = moment(saleDates[count]).format('dddd')
                                newWeek.push(formattedTime);
                                tempSaleArray.push(saleTotalArray[count]);
                                count++;

                           }
                           else
                           {
                                formattedTime = moment(comDate).format('dddd')
                                newWeek.push(formattedTime);
                               
                                tempSaleArray.push(0);
                                

                           }
                         
                           
                           
                           day = new Date(prevDay);
                           //prevDay = prevDay.getFullYear()+'-'+(prevDay.getMonth())+'-'+(prevDay.getDate()-1);
                           prevDay.setDate(day.getDate()-1);
                           comDate = prevDay.getFullYear()+'-'+(prevDay.getMonth()+1)+'-'+prevDay.getDate();
                           //console.log(comDate);
                           //console.log(moment(comDate).format('dddd'));

                        }
                    }
                   

                    if(salePeriod=="Daily")
                    {
                        newWeek.push(saleGraphDays[0]);
                        tempSaleArray.push(saleTotalArray[0]);
                    }
                }
                
                console.log(tempSaleArray);
                console.log(newWeek);
                /*new Chart(document.getElementById("line-chart"), {
                    type: 'line',
                    data: {
                      labels: saleGraphDays,
                      datasets: [{ 
                          data: tempSaleArray,
                          label: "Sales",
                          borderColor: "#3e95cd",
                          fill: false
                        }
                      ]
                    },
                    options: {
                      title: {
                        display: true,
                        text: ''
                      }
                    }
                  });*/




               
               }
               else
               {
                   
                   if(salePeriod=="Weekly")
                   {
                    new Chart(document.getElementById("line-chart"), {
                        type: 'line',
                        data: {
                          labels: ["DAYS"],
                          datasets: [{ 
                              data: [0],
                              label: "Sales",
                              borderColor: "#3e95cd",
                              fill: false
                            }
                          ]
                        },
                        options: {
                          title: {
                            display: true,
                            text: tableHeader
                          }
                        }
                      });

                    salePeriod = salePeriod.toUpperCase();
                    $("#tBody").append("<tr></tr>").text(`NO SALES HAVE BEEN MADE ,IN THE LAST WEEK,IN ORDER TO MAKE A ${salePeriod} SALES REPORT`);
                   }
                   else if(salePeriod=="Monthly")
                   {
                    new Chart(document.getElementById("line-chart"), {
                        type: 'line',
                        data: {
                          labels: ["DAYS"],
                          datasets: [{ 
                              data: [0],
                              label: "Sales",
                              borderColor: "#3e95cd",
                              fill: false
                            }
                          ]
                        },
                        options: {
                          title: {
                            display: true,
                            text: tableHeader
                          }
                        }
                      });

                    salePeriod = salePeriod.toUpperCase();
                    $("#tBody").append("<tr></tr>").text(`NO SALES HAVE BEEN MADE ,IN THE LAST MONTH, IN ORDER TO MAKE A ${salePeriod} SALES REPORT`);
                   }
                   else
                   {

                    new Chart(document.getElementById("line-chart"), {
                        type: 'line',
                        data: {
                          labels: ["DAYS"],
                          datasets: [{ 
                              data: [0],
                              label: "Sales",
                              borderColor: "#3e95cd",
                              fill: false
                            }
                          ]
                        },
                        options: {
                          title: {
                            display: true,
                            text: tableHeader
                          }
                        }
                      });
                      
                    salePeriod = salePeriod.toUpperCase();
                    $("#tBody").append("<tr></tr>").text(`NO SALES HAVE BEEN MADE TODAY IN ORDER TO MAKE A ${salePeriod} SALES REPORT`);
                   }
               
               } 
               

            }
            else
            {
                alert("Error");
            }
        });
    });
    /* let redCount=0;
                let greenCount=0;
                let arrayOfProdNames = [];
                let arrayOfProdTotals = [];
                let arrayOfProdTypes = [];
                let arrayOfProdTypesTotal = [];
                let arrayOfIDs = [];
                let prodTypeNamesArray = [];                
                let idCount =0;

                //Group same IDs
            function groupProductTypes(array)
                    {
                        for(let i=0;i<array.length;i++)
                        {

                            for(let b=0;b<array.length;b++)
                            {
                                if(array[i] == array[b])
                                {
                                    arrayOfIDs.push(array[b]);
                                
                                }
                            

                            }
                        }
                    }
                

                //Sort occurance of IDs from High to Low
                

               


                function sortProductTypes(array) {
                    var howMany = {};
                
                    array.forEach(function(value) { howMany[value] = 0; });
                
                    var uniques = array.filter(function(value) {
                        return ++howMany[value] == 1;
                    });
                
                    return uniques.sort(function(a, b) {
                        return howMany[b] - howMany[a];
                    });
                }
                    console.log(arr[0].PRODUCT_SIZE_TYPE);
               

                

              for(let k=0;k<arr.length;k++)
                {	
                   if(k<5)
                   {
                   
                        let pType="Individual";
                        let pNumber= 1;
                        if(arr[k].PRODUCT_SIZE_TYPE==2)
                        {
                            pType="Case";
                            pNumber=arr[k].UNITS_PER_CASE;
                        }
                        else if(arr[k].PRODUCT_SIZE_TYPE==3)
                        {
                            pType="Pallet";
                            pNumber=arr[k].CASES_PER_PALLET;
                        }
    
                        let theProductName = arr[k].NAME+" ("+pNumber+" x "+arr[k].PRODUCT_MEASUREMENT+arr[k].PRODUCT_MEASUREMENT_UNIT+")"+" "+pType;
                        arrayOfProdNames.push(theProductName);
                        arrayOfProdTotals.push(arr[k].TOTAL_PRODUCT_QUANTITY);
                        arrayOfProdTypes.push(arr[k].PRODUCT_TYPE_ID);
                        
                        //let theUnitPrice = productsArray[productIndex].SELLING_PRICE;
                    }
                    
                   
                    
                    
                }

                groupProductTypes(arrayOfProdTypes); // Group product types
                let sortedProductTypesArray=sortProductTypes(arrayOfIDs); //sortedProductTypes
                console.log(sortedProductTypesArray);
                
                let countOfProdTypes = 0;
                //Loop for second graph
                for(let k=0;k<arr.length;k++)
                {	
                   if(k<5)
                   {
                    if(sortedProductTypesArray[k]==arr[k].PRODUCT_TYPE_ID)
                    {
                       
                        if(!prodTypeNamesArray.includes(arr[k].TYPE_NAME))
                        {
                            prodTypeNamesArray.push(arr[k].TYPE_NAME);

                        }
                    }
                   }
                }


                //Get the quantity of product types
                for(let k=0;k<prodTypeNamesArray.length;k++)
                {	
                   
                        for(let t=0;t<arr.length;t++)
                        {
                        
                            if(prodTypeNamesArray[k] ==arr[t].TYPE_NAME )
                            {
                                countOfProdTypes += parseInt(arr[t].TOTAL_PRODUCT_QUANTITY);
                                console.log(arr[t].TOTAL_PRODUCT_QUANTITY);

                            }
                        }
                        arrayOfProdTypesTotal.push(countOfProdTypes);
                }
              console.log(arrayOfProdTypesTotal);
              console.log(prodTypeNamesArray);

                let newLabels =  ["All Gold Tomato Sauce (6x700ml) Case", "Coca Cola (6x2l) Case", "Kingsley Ginger Bear (6x2l) Case", "Dragon Energy Drink (24x500ml) Case", "Monster Energy Drink (24x500ml) Case"];

               new Chart(document.getElementById("pie-chart"), {
                    type: 'pie',
                    data: {
                      labels:arrayOfProdNames,
                      datasets: [{
                        label: "No Of Sales",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: arrayOfProdTotals
                      }]
                    },
                    options: {
                      title: {
                        display: true,
                        text: 'TOP 5 MOST SOLD PRODUCTS'
                      }
                    }
                });
          
                new Chart(document.getElementById("pie-chart2"), {
                    type: 'pie',
                    data: {
                      labels: prodTypeNamesArray,
                      datasets: [{
                        label: "No Of Sales",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: arrayOfProdTypesTotal
                      }]
                    },
                    options: {
                      title: {
                        display: true,
                        text: 'TOP 5 MOST SOLD PRODUCT TYPES'
                      }
                    }
                });


                //Get Max
                let maxQuantity = Math.max(...arrayOfProdTotals);
                let MaxProductName = "";
                for(var i=0;i<arrayOfProdTotals.length;i++)
                {
                    if(arrayOfProdTotals[i] == maxQuantity )
                    {
                         MaxProductName = arrayOfProdNames[i];
                      
                    }
                }
              
             
                 console.log(MaxProductName);
             

                let MaxQuantityTypeSold = Math.max(...arrayOfProdTypesTotal);
            
                let MaxProductType= prodTypeNamesArray[arrayOfProdTypesTotal.indexOf(MaxQuantityTypeSold)];
                $("#MaxProductName").text(MaxProductName);
                $("#MaxQuantitySold").text(`${maxQuantity} Sold.`);
                $("#MaxProductType").text(MaxProductType);
                $("#MaxQuantityTypeSold").text(`${MaxQuantityTypeSold} Sold.`);

                //Get Min

                let minQuantity = Math.min(...arrayOfProdTotals);
                let MinProductName = "";
                for(var i=0;i<arrayOfProdTotals.length;i++)
                {
                    if(arrayOfProdTotals[i] == minQuantity )
                    {
                        MinProductName = arrayOfProdNames[i];
                      
                    }
                }

                let MinQuantityTypeSold = Math.min(...arrayOfProdTypesTotal);
                let MinProductType= prodTypeNamesArray[arrayOfProdTypesTotal.indexOf(MinQuantityTypeSold)];

                $("#MinProductName").text(MinProductName);
                $("#MinQuantitySold").text(`${minQuantity} Sold.`);
                $("#MinProductType").text(MinProductType);
                $("#MinQuantityTypeSold").text(`${MinQuantityTypeSold} Sold.`);
                

  <tr>
            <td class="no">January 2019</td>
            <td class="desc">678</td>
            <td class="unit-right">R123 567.00</td>
          </tr>
 */