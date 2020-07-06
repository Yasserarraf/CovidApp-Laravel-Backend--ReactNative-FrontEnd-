var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new   Chart(ctxL, {
type: 'line',
data: {
labels: ["January", "February", "March", "April", "May", "June", "July"],
datasets: [{
label: "My First dataset",
data: [65, 59, 80, 81, 56, 55, 40],
backgroundColor: [
'rgba(105, 0, 132, .2)',
],
borderColor: [
'rgba(200, 99, 132, .7)',
],
borderWidth: 2
},
{
label: "My Second dataset",
data: [28, 48, 40, 19, 86, 27, 90],
backgroundColor: [
'rgba(0, 137, 132, .2)',
],
borderColor: [
'rgba(0, 10, 130, .7)',
],
borderWidth: 2
}
]
},
options: {
responsive: true
}
});
var ctx = document.getElementById("Doughnut").getContext('2d');

var data1 = {
    labels: ["Negative", "Positive"],
    datasets: [
      {
        label: "Infection Test Results",
        data: [10, 50],
        backgroundColor: [
          "#007bff",
          "#DC143C",

        ],
        borderColor: [
          "#007bff",
          "#CB252B",
        ],
        borderWidth: [1, 1, 1, 1, 1]
      }
    ]
  };
  var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        text: "Test Result",
        fontSize: 18,
        fontColor: "#111"
      },
      legend: {
        display: true,
        position: "bottom",
        labels: {
          fontColor: "#333",
          fontSize: 16
        }
      }
    };
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data1,
        options: options
    });
