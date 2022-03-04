const ptx = document.getElementById('pieChart').getContext('2d');
  const pieChart = new Chart(ptx, {
      type: 'pie',
      data: {
          labels: ['Model X','Model Y','Model 3', 'Model S'],
          datasets: [{
              label: 'No. of Cars Sold',
              data: [82, 32, 45, 39],
              backgroundColor: [
                  //'linear-gradient(45deg, #4099ff, #73b4ff)',
                  //'rgba(115,180,255,0.8)',
                  'rgba(255, 99, 132, 0.8)',
                  'rgba(54, 162, 235, 0.8)',
                  'rgba(255, 206, 86, 0.8)',
                  'rgba(75, 192, 192, 0.8)',
                  'rgba(153, 102, 255, 0.8)',
                  'rgba(255, 159, 64, 0.8)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          responsive: false,
          maintainAspectRatio: true,
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });