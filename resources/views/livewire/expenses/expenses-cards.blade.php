<div wire:poll.5s>
    {{-- Be like water. --}}
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-6 col-md-6">
            <div class="card bg-info">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h4 class="card-title text-white">Todays Total Expenses</h4>
                        </div>
                        <div class="ms-auto text-white">
                            Ugx: {{ number_format($todays_total)}}
                        </div>
                    </div>
                    <div id="spark5"></div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-6 col-md-6">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <h4 class="card-title text-white">Total Expenses</h4>
                        </div>
                        <div class="ms-auto text-white">
                            Ugx: {{ number_format($total)}}
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
