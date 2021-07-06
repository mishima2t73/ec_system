//「月別データ」
let d = new Date();
let todate = d.getDate();
let month = d.getMonth()+1;

let labelset = [month+"月",month-1+"月",month-2+"月",month-3+"月"];
let today_sales = document.getElementById('today_sales');
//let month_sales = document.getElementById('month_sales');

let month_sales1 = document.getElementById('month_sales_1');
let month_sales2 = document.getElementById('month_sales_2');
let month_sales3 = document.getElementById('month_sales_3');
let month_sales4 = document.getElementById('month_sales_4');

let dataset = [month_sales1.value,month_sales2.value,month_sales3.value,month_sales4.value];

var mydata = {
    labels: labelset,
    datasets: [
      {
        label: '売上',
        hoverBackgroundColor: "rgba(255,99,132,0.3)",
        data: dataset
      }
    ]
  };
  
  //「オプション設定」
  var options = {
    title: {    
      display: true,
      text: '売上'
    }
  };
  
  var canvas = document.getElementById('stage');
  var chart = new Chart(canvas, {
  
    type: 'bar',  //グラフの種類
    data: mydata,  //表示するデータ
    options: options  //オプション設定
  
  });