<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                Customer
            </a>

            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-clinic-medical"></i></div>
                Pharmacies
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="pharmaciesData.php">Pharmacies Data</a>
                    <a class="nav-link collapsed" href="Addpharmacies.php">
                        Add Pharmacies
                    </a>
                </nav>
            </div>


            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#medicinecollapse"
                aria-expanded="false" aria-controls="medicinecollapse">
                <div class="sb-nav-link-icon"><i class="fas fa-briefcase-medical"></i></div>
                Medicines
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="medicinecollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="Medicines.php">Medicines Data</a>
                    <a class="nav-link collapsed" href="AddMedicines.php">
                        Add Medicines
                    </a>
                </nav>
            </div>


            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Orderdetailcollaps"
                aria-expanded="false" aria-controls="Orderdetailcollaps">
                <div class="sb-nav-link-icon"><i class="fab fa-first-order"></i></div>
                Orders Details
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="Orderdetailcollaps" aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="Orders.php">
                        Orders
                    </a>
                    <a class="nav-link" href="cancel Orders.php">
                        Cancel Order
                    </a>
                    <a class="nav-link" href="Sell.php">
                        Sell
                    </a>
                </nav>
            </div>




            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ReportCollaps"
                aria-expanded="false" aria-controls="ReportCollaps">
                <div class="sb-nav-link-icon"><i class="fa fa-file"></i></div>
                Report
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="ReportCollaps" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="report.php?id=d">
                        Daily
                    </a>
                    <a class="nav-link" href="report.php?id=w">
                        Weekly</a>
                    <a class="nav-link" href="report.php?id=m">
                        Monthly
                    </a>
                </nav>
            </div>

            <a class="nav-link" href="Menu.php">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Menu
            </a>
            <a class="nav-link" href="ShopAvaliable.php">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Shop available
            </a>

            <a class="nav-link" href="Prescription.php">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Prescription
            </a>
        </div>
    </div>

</nav>