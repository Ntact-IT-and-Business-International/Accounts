<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="/dashboard"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>
                <li> <a class="waves-effect waves-dark" href="/income/income"><i class="ti-book"></i><span class="hide-menu">Income</span></a></li>
                <li> <a class="waves-effect waves-dark" href="/items/items"><i class="ti-book"></i><span class="hide-menu">Items</span></a></li>
                <li> <a class="waves-effect waves-dark" href="/purchase/purchases"><i class="ti-shopping-cart"></i><span class="hide-menu">Purchase</span></a></li>
                <li> <a class="waves-effect waves-dark" href="/expenses/expenses"><i class="ti-book"></i><span class="hide-menu">Expenses</span></a></li>
                <li> <a class="waves-effect waves-dark" href="/revenue/revenue"><i class="ti-book"></i><span class="hide-menu">Revenue</span></a></li>
                <li> <a class="waves-effect waves-dark" href="/sold-items/sold-items"><i class="ti-book"></i><span class="hide-menu">Sold Items</span></a></li>
                @can('manage_users')
                    <li> <a class="waves-effect waves-dark" href="/accountsettings"><i class="ti-settings"></i><span class="hide-menu">Create Account</span></a></li>
                @endcan
            </ul>
        </nav>
    <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
