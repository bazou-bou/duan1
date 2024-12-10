<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thống Kê</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/admin/view/css/styleindex.css">
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/admin/view/css/chitietsanpham.css">
</head>

<body>
    <!-- Header -->
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/header.html'; ?>
    </header>

    <main>
        <div class="main-content">
            <div class="container">
                <!-- Thống kê chính -->
                <div class="container-table">
                    <div class="row text-center mt-3">
                        <!-- Tổng Số Người Dùng -->
                        <div class="col-md-4">
                            <div class="card shadow-sm p-3">
                                <div class="card-body text-center">
                                    <i class="bi bi-person-fill" style="font-size: 2rem;"></i>
                                    <h5 class="card-title mt-2">Tổng Số Người Dùng</h5>
                                    <p class="card-text display-6"><?= number_format((float)($totalUsers)); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Tổng Đơn Hàng -->
                        <div class="col-md-4">
                            <div class="card shadow-sm p-3">
                                <div class="card-body text-center">
                                    <i class="bi bi-basket-fill" style="font-size: 2rem;"></i>
                                    <h5 class="card-title mt-2">Tổng Đơn Hàng</h5>
                                    <p class="card-text display-6"><?= number_format((float)($donHang)); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Tổng Doanh Thu -->
                        <div class="col-md-4">
                            <div class="card shadow-sm p-3">
                                <div class="card-body text-center">
                                    <i class="bi bi-cash-stack" style="font-size: 2rem;"></i>
                                    <h5 class="card-title mt-2">Tổng Doanh Thu</h5>
                                    <p class="card-text display-6"><?= number_format((float)$doanhThu['total_revenue'], 0, ',', '.'); ?> VNĐ</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lọc theo ngày -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card shadow-sm p-3">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-primary mb-4">Lọc Theo Ngày</h5>

                                    <!-- Các nút lọc nhanh -->
                                    <div class="btn-group mb-3">
                                        <button class="btn btn-outline-primary mx-2" onclick="filterQuick('6months')">6 Tháng Gần Đây</button>
                                        <button class="btn btn-outline-primary mx-2" onclick="filterQuick('1month')">1 Tháng</button>
                                        <button class="btn btn-outline-primary mx-2" onclick="filterQuick('1year')">1 Năm</button>
                                    </div>

                                    <div class="d-flex justify-content-center align-items-center mb-4">
                                        <label for="startDate" class="me-2">Từ Ngày:</label>
                                        <input type="date" id="startDate" class="form-control w-auto h-100">
                                        <label for="endDate" class="mx-3">Đến Ngày:</label>
                                        <input type="date" id="endDate" class="form-control w-auto h-100">
                                        <button class="btn btn-success align-self-center ms-3 me-2" onclick="filterData()">Lọc</button>
                                    </div>

                                    <div class="d-flex justify-content-center mb-4">
                                        <!-- Nút để ẩn/hiện doanh thu và đơn hàng -->
                                        <div class="d-flex justify-content-end mb-3">
                                            <button id="toggleRevenueBtn" class="btn btn-info">Ẩn/Hiện Doanh Thu</button>
                                            <button id="toggleOrdersBtn" class="btn btn-info ms-2">Ẩn/Hiện Đơn Hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Biểu đồ và danh sách -->
                    <div class="row mt-5">
                        <div class="col-md-8">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Biểu Đồ Doanh Thu và Đơn Hàng</h5>
                                    <canvas id="revenueChart" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3 class="text-center">Khách Hàng Mua Nhiều Nhất</h3>
                            <div class="card shadow-sm">
                                <?php foreach ($topKhachHang as $value) { ?>
                                    <div class="card-body">
                                        <h5 class="card-title">Tên Khách Hàng: <?= htmlspecialchars($value->username) ?></h5>
                                        <ul class="list-group">
                                            <li class="list-group-item">Số đơn hàng: <strong><?= number_format((float)($value->total_orders ?? 0), 0); ?></strong></li>
                                            <li class="list-group-item">Doanh thu ngày: <strong><?= number_format((float)($value->total_spent ?? 0), 0); ?> VNĐ</strong></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <footer>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/footer.html'; ?>
                </footer>
            </div>

            <div class="sidebar bg-black">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/sidebar.html'; ?>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js (dành cho biểu đồ) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // Dữ liệu từ PHP (sẵn có)
    const doanhSoTheoNam = <?php echo json_encode($doanhSoTheoNam); ?>;
    const donHangTheoNam = <?php echo json_encode($donHangTheoNam); ?>;

    // Tạo các mảng labels (tháng), doanh thu và số lượng đơn hàng
    const labels = doanhSoTheoNam.map(item => item.date).reverse(); // Ngày đầy đủ
    const revenues = doanhSoTheoNam.map(item => parseInt(item.total_revenue)).reverse();
    const orders = donHangTheoNam.map(item => parseInt(item.total_orders)).reverse();

    // Chuyển dữ liệu ra biểu đồ
    const ctx = document.getElementById('revenueChart').getContext('2d');
    let revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels, 
            datasets: [
                {
                    label: 'Doanh Thu',
                    data: revenues, 
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
                },
                {
                    label: 'Số Đơn Hàng',
                    data: orders, 
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 2,
                    yAxisID: 'y2'
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true, 
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString();
                        }
                    }
                },
                y2: {
                    beginAtZero: true, 
                    position: 'right',
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Lọc theo khoảng thời gian
    function filterQuick(period) {
        const date = new Date();
        let startDate = '';
        let endDate = '';

        if (period === '6months') {
            startDate = new Date();
            startDate.setMonth(date.getMonth() - 6);
        } else if (period === '1month') {
            startDate = new Date();
            startDate.setMonth(date.getMonth() - 1);
        } else if (period === '1year') {
            startDate = new Date();
            startDate.setFullYear(date.getFullYear() - 1);
        }

        document.getElementById('startDate').value = startDate.toISOString().split('T')[0];
        document.getElementById('endDate').value = date.toISOString().split('T')[0];
    }

    // Hàm lọc dữ liệu theo ngày
    function filterData() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        // Chuyển đổi startDate và endDate thành dạng Date
        const start = new Date(startDate);
        const end = new Date(endDate);
        
        // Lọc dữ liệu doanh thu và đơn hàng dựa trên khoảng thời gian
        const filteredMonths = [];
        const filteredRevenues = [];
        const filteredOrders = [];
        
        for (let i = 0; i < months.length; i++) {
            const monthYear = months[i].split('/');
            const month = parseInt(monthYear[0]);
            const year = parseInt(monthYear[1]);
            const currentMonthDate = new Date(year, month - 1);

            // Kiểm tra nếu tháng nằm trong khoảng ngày lọc
            if (currentMonthDate >= start && currentMonthDate <= end) {
                filteredMonths.push(months[i]);
                filteredRevenues.push(revenues[i]);
                filteredOrders.push(orders[i]);
            }
        }

        // Cập nhật lại biểu đồ với dữ liệu đã lọc
        revenueChart.data.labels = filteredMonths;
        revenueChart.data.datasets[0].data = filteredRevenues;
        revenueChart.data.datasets[1].data = filteredOrders;
        revenueChart.update();
    }
</script>

</body>

</html>
