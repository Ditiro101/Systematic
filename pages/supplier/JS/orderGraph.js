$(()=>{
    
        var salePeriod = "Weekly";
        //var dateTo = $('#dateTo').text().trim();
        let tableHeader;
        console.log(salePeriod);
        if(salePeriod=="Weekly")
        {
            $("#PeriodAttrOrder").text("Weekly Total Orders");
                tableHeader = "SALES FOR THE WEEK";
        }   
     
    
        $.ajax({
            url: 'pages/supplier/PHPcode/orderGraph.php',
            type: 'POST',
            data: {SALEPERIOD:salePeriod} 
        })
        .done(data=>{
            
            if(data!="False")
            {
                console.log(data);
                let arr=JSON.parse(data);
                console.log(arr);


                console.log(arr[0]["ORDER_DATE"]);
                console.log( moment(arr[0]["ORDER_DATE"]).format('dddd'));
                let tableEntries="";
                let formView="";
                let totalOrders = 0;
                //[1, 2, 3, 4].reduce((a, b) => a + b, 0)
                let orderTotalArray=[];
                let daysOfTheWeek;
                let previousDay;
                let statictotalOrders = 0;
                let futureDay;
                let arrLength = arr.length;
                console.log(arrLength);

                let orderGraphDays = [];


               if(arr != "Empty")
               {
                for(let k=0;k<arr.length;k++)
                {
                    let day = toString(arr[k]["ORDER_DATE"]);
                    daysOfTheWeek = arr[k]["ORDER_DATE"].split(" ");
                    if(k < arrLength-1)
                    {
                        futureDay = arr[k+1]["ORDER_DATE"].split(" ");
                        console.log(futureDay[0]);
                    }
                    else
                    {
                        futureDay = arr[k]["ORDER_DATE"].split(" ");
                    }
                    
                    var formattedTime = moment(daysOfTheWeek[0]).format('dddd');
                    ++totalOrders;
                    
                    
                      
                       

                        if(previousDay == futureDay[0])
                        {
                            if(salePeriod=="Weekly")
                            {
                                //orderTotalArray.push(arr[k]["SALE_AMOUNT"]);
                                previousDay = daysOfTheWeek[0];
                                console.log("1");
                            }
                            else if(salePeriod=="Monthly")
                            {
                                //orderTotalArray.push(arr[k]["SALE_AMOUNT"]);
                                previousDay = daysOfTheWeek[0];
                            }
                            else
                            {
                               
                                previousDay = daysOfTheWeek[0];
                            }
                        }
                        else if(daysOfTheWeek[0] == previousDay)
                        {
                            
                            
                            if(salePeriod=="Weekly")
                            {
                                //orderTotalArray.push(arr[k]["SALE_AMOUNT"]);
                                previousDay = daysOfTheWeek[0];
                              
                            }
                            else if(salePeriod=="Monthly")
                            {
                                //orderTotalArray.push(arr[k]["SALE_AMOUNT"]);
                                previousDay = daysOfTheWeek[0];
                            }
                            else
                            {
                                
                                previousDay = daysOfTheWeek[0];
                            }
                            
    
                          
                            
                        }
                        if(previousDay != futureDay[0] && daysOfTheWeek[0] != futureDay[0])
                        {
                      

                               
                                
                                    //orderTotalArray.push(arr[k]["SALE_AMOUNT"]);
                                    //formView="<form action='view-order.php' method='POST'><input type='hidden' name='ORDER_ID' value='"+ordersArray[k]["ORDER_ID"]+"'>"+"<button class='btn btn-icon btn-2 btn-success btn-sm' type='submit'><span class='btn-inner--icon'><i class='fas fa-eye'></i></span><span class='btn-inner--text'>View</span></button>"+"</form>";
                                    tableEntries+="<tr><td class='no'>"+formattedTime+"</td><td class='desc' id='totalOrders'>"+totalOrders +"</td><td class='unit-right' id='SaleTotal'>"+statictotalOrders.toFixed(2)+"</td></tr>";
                                    previousDay = daysOfTheWeek[0];

                                    orderTotalArray.push(totalOrders);
                                    formattedTime = moment(daysOfTheWeek[0]).format('dddd');
                                    orderGraphDays.push(formattedTime);
                                    //console.log("1");
                                    //console.log(totalOrders);
                                    totalOrders = 0;
                                    statictotalOrders = 0;

                                    
                        }
                    if(k == arrLength-1 && previousDay==daysOfTheWeek[0])
                    {
                       
                        tableEntries+="<tr><td class='no'>"+formattedTime+"</td><td class='desc' id='totalOrders'>"+totalOrders +"</td><td class='unit-right' id='SaleTotal'>"+statictotalOrders.toFixed(2)+"</td></tr>";
                        previousDay = daysOfTheWeek[0];
                        orderTotalArray.push(totalOrders);
                        formattedTime = moment(daysOfTheWeek[0]).format('dddd');
                        orderGraphDays.push(formattedTime);
                        

                    }
                    else
                    {
                        
                        previousDay = daysOfTheWeek[0];
                        if(k == arrLength-1 && previousDay==daysOfTheWeek[0])
                        {
                            tableEntries+="<tr><td class='no'>"+formattedTime+"</td><td class='desc' id='totalOrders'>"+totalOrders +"</td><td class='unit-right' id='SaleTotal'>"+statictotalOrders.toFixed(2)+"</td></tr>";
                            previousDay = daysOfTheWeek[0];
                            orderTotalArray.push(totalOrders);
                            formattedTime = moment(daysOfTheWeek[0]).format('dddd');
                            orderGraphDays.push(formattedTime);                            
                        }

                        console.log("Catch");
                    }

                    
                   
                }
               

            
                
                $("#tBody").append(tableEntries);
               



               //Display Graph
                console.log(orderGraphDays);
                orderTotalArray.reverse();
                console.log(orderTotalArray);
                /*for(int i = 0;i<orderGraphDays.length;i++)
                {

                }*/
                //have while loop that starts from the back to put the specefic values of a specefic day onto the graph.
                let tempOrderArray = [];
              
                    for(let a=orderTotalArray.length-1;a>=0;a--)
                    {
                        
                            tempOrderArray.push(orderTotalArray[a]);
                         
                       
                    }

                   
    
                console.log(tempOrderArray);
                
               let maxValue = Math.max(...tempOrderArray);
               console.log(maxValue);
                new Chart(document.getElementById("bar-chart"), {
                    type: 'bar',
                    data: {
                      labels: orderGraphDays,
                      datasets: [{ 
                          data: tempOrderArray,
                          label: "Orders",
                          borderColor: "#3e95cd",
                          fill: false
                        }
                      ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    stepSize :2,
                                    max: maxValue
                                }
                            }]
                        }
                    }
                  });




                  
                   /* data: [454,786,675,786,635,809,655],
                    label: "2018",
                    borderColor: "#8e5ea2",
                    fill: false
                  }, { 
                    data: [678,787,745,876,956,1046,986],
                    label: "2019",
                    borderColor: "#7cbf56",
                    fill: false
                  }*/
              /* }
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
                   }*/
               
               } 
               

            }
            else
            {
                alert("Error");
            }
        });
    });
 