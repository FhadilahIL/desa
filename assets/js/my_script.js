$(document).ready(function () {
	$.ajax({
		url: '/desa/admin/pengaduan_perbulan/',
		dataType: 'json',
		success: function (data) {
			var ctx = document.getElementById('myChart').getContext('2d')
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
					datasets: [{
						label: 'Jumlah Pengaduan ',
						data: [data[0], data[1], data[2], data[3], data[4], data[5], data[6], data[7], data[8], data[9], data[10], data[11]],
						backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#36b9cc", "#36b9cc", "#36b9cc", "#36b9cc", "#36b9cc", "#36b9cc", "#36b9cc", "#36b9cc", "#36b9cc"],
						hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf", "#2c9faf", "#2c9faf", "#2c9faf", "#2c9faf", "#2c9faf", "#2c9faf", "#2c9faf", "#2c9faf", "#2c9faf"],
						hoverBorderColor: "rgba(234, 236, 244, 1)"
					}]
				},
				options: {
					maintainAspectRatio: false,
					tooltips: {
						backgroundColor: "rgba(0, 0, 0, 0.7)",
						bodyFontColor: "#ffffff",
						borderColor: "#000000",
						borderWidth: 1,
						xPadding: 15,
						yPadding: 15,
						displayColors: false
					},
					legend: {
						display: false,
					},
					scales: {
						xAxes: [{
							gridLines: {
								display: false
							}
						}],
						yAxes: [{
							gridLines: {
								display: false
							},
							ticks: {
								stepSize: 2
							}
						}]
					}
				},
			})
		}
	})
});
