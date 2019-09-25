<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Product Trends Report - Stock Path</title>
    <link rel="stylesheet" href="product_trends_CSS/style.css" media="all" />
    <link href="product_trends_CSS/favicon.png" rel="icon" type="image/png">
    <script type="text/javascript" src="product_trends_CSS/Chart.bundle.js"></script>
     <script type="text/javascript" src="product_trends_CSS/Chart.min.js"></script>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="product_trends_CSS/logo.png">
      </div>
      <div id="company">

        <h2 class="name">Greens Supermarket</h2>
        <div>Plot 80 Poprtion 2,
              Bethanie Road,
              Brits, 0250</div>
        <div>+27 12 254 0224</div>
        <div><a>info@greens.co.za</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="name"><b>Date Generated :</b> dd/mm/yyyy</div>
          <div class="address"><b>Time Generated :</b> HH:mm</div>
        </div>
        <div id="invoice">
          <h1>Product Trends Report</h1>
          <div class="date"><b>From :</b>01/01/2019</div>
          <div class="date"><b>To : </b>31/07/2019</div>
        </div>
      </div>
      <div style="margin-bottom: 1rem;">
        <canvas id="pie-chart" width="800" height="300"></canvas>
      </div>
      <div style="margin-bottom: 1rem;">
        <canvas id="pie-chart2" width="800" height="300"></canvas>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td class="no">Product with most number of sales</td>
            <td class="unit-right">Coca Cola (6x2l) Case</td>
            <td class="desc">8 546 Sales</td>
          </tr>
          <tr>
            <td class="no">Product type with most number of sales</td>
            <td class="unit-right">Beverage</td>
            <td class="desc">10 067 Sales</td>
          </tr>
          <tr>
            <td class="total-red">Product with least number of sales</td>
            <td class="unit-right">All Gold Tomato Sauce (6x350ml) Case</td>
            <td class="desc">117 Sales</td>
          </tr>
          <tr>
            <td class="total-red">Product type with least number of sales</td>
            <td class="unit-right">Spices</td>
            <td class="desc">123 Sales</td>
          </tr>
        </tbody>
      </table>
      <table>
        <tfoot>   

        </tfoot>
      </table>
      <div id="notices">
        
      </div>
    </main>
    <footer>
      © 2019 Stock Path
    </footer>
    <script type="text/javascript">
      new Chart(document.getElementById("pie-chart"), {
          type: 'pie',
          data: {
            labels: ["All Gold Tomato Sauce (6x700ml) Case", "Coca Cola (6x2l) Case", "Kingsley Ginger Bear (6x2l) Case", "Dragon Energy Drink (24x500ml) Case", "Monster Energy Drink (24x500ml) Case"],
            datasets: [{
              label: "No Of Sales",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
              data: [2478,5267,734,784,433]
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
            labels: ["Beverage", "Alcohol", "Food", "Spice", "Sweets & Gums"],
            datasets: [{
              label: "No Of Sales",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
              data: [543,453,234,267,123]
            }]
          },
          options: {
            title: {
              display: true,
              text: 'TOP 5 MOST SOLD PRODUCT TYPES'
            }
          }
      });
    </script>
  </body>
</html>