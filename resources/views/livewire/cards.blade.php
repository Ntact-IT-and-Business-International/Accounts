<div>
    {{-- Success is as dangerous as failure. --}}
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="social-widget">
                            <div class="soc-header box-facebook"></div>
                            <div class="soc-content">
                                <div class="col-6 b-r">
                                    <h3 class="font-medium">Total Income</h3>
                                </div>
                                <div class="col-6">
                                    <h3 class="font-medium">Ugx :{{number_format($total_income)}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="social-widget">
                            <div class="soc-header box-twitter"></div>
                            <div class="soc-content">
                                <div class="col-6 b-r">
                                    <h3 class="font-medium">Expenditures</h3>
                                </div>
                                <div class="col-6">
                                    <h3 class="font-medium">Ugx :{{number_format($total_expenses)}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="social-widget">
                            <div class="soc-header box-google"></div>
                            <div class="soc-content">
                                <div class="col-6 b-r">
                                    <h3 class="font-medium">Total Cash</h3>
                                </div>
                                <div class="col-6">
                                    <h3 class="font-medium">Ugx :{{number_format($total_income -$total_expenses)}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="social-widget">
                            <div class="soc-header box-linkedin"></div>
                            <div class="soc-content">
                                <div class="col-6 b-r">
                                    <h3 class="font-medium">This Month Exp.</h3>
                                </div>
                                <div class="col-6">
                                    <h3 class="font-medium">Ugx :{{number_format($monthly_expenses)}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
</div>
