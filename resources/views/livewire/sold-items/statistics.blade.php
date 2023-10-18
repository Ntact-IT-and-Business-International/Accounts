<div wire:poll.5s>
    {{-- Be like water. --}}
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-3">
            <div class="card bg-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h4 class="card-title text-white">Generated Revenue Today</h4>
                        </div>
                        <div class="ms-auto text-white">
                            Ugx: {{ number_format($total_revenue_generated_today)}}
                        </div>
                    </div>
                    <div id="spark5"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card" style="background-color: green">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h4 class="card-title text-white">Today's Generated Profits</h4>
                        </div>
                        <div class="ms-auto text-white">
                            Ugx: {{ number_format($total_generated_profits_today)}}
                        </div>
                    </div>
                    <div id="spark6"></div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h4 class="card-title text-white">Total Generated Revenue</h4>
                        </div>
                        <div class="ms-auto text-white">
                            Ugx: {{ number_format($total_revenue_generated)}}
                        </div>
                    </div>
                    <div id="spark6"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h4 class="card-title text-white">Total Generated Profits</h4>
                        </div>
                        <div class="ms-auto text-white">
                            Ugx: {{ number_format($profits_made)}}
                        </div>
                    </div>
                    <div id="spark6"></div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
</div>
