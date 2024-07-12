@push('rate', 'active')

<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-info text-white-all">
            <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i>Rates</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12 col-md-4">
        </div>

        <div class="col-12 col-md-8">

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="searchKey" wire:keyup="FetchData" placeholder="Search Here..."
                        aria-label="">
                    <div class="input-group-append">
                        <button class="btn search-btn" wire:click="FetchData">Search</button>
                    </div>
                    @if (in_array('Save', $page_action))
                    <button id="formOpen" wire:click="openModel" class="btn create-btn ml-1"><i class="fa fa-plus"
                            aria-hidden="true"></i> Create-New
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12 col-md-12">
            <div class="card">
                <div class="p-4">
                    <h4>Rates</h4>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport">
                            <tr class="text-center">
                                <th>No</th>
                                <th>No of Days</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            {{-- @php($x = 1) --}}
                            @foreach ($items as $row)
                            <tr class="text-center">
                                <td>{{ $items->firstItem() + $loop->iteration -1 }}</td>
                                <td>{{$row->number_of_days}}</td>
                                <td>{{number_format(($row->amount),2,'.','')}}</td>
                                <td>
                                    @if (in_array('Update', $page_action))
                                    <a href="#" class="text-info" wire:click="updateRecord({{ $row->id }})"><i
                                            class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                    @if (in_array('Delete', $page_action))
                                    <a href="#" class="text-danger m-2" wire:click="deleteOpenModel({{ $row->id }})"><i
                                            class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            {{-- @php($x++) --}}
                            @endforeach
                        </table>
                        <div class="row">
                            <div class="col-6 ml-2">
                                Showing {{$items->firstItem()}} - {{$items->lastItem()}} of {{$items->total()}}
                            </div>
                        </div>
                        <div class="float-right mr-3">
                            {{$items->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Insert model here --}}
    <div wire:ignore.self class="modal fade" id="insert-model" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">{{ $key != 0 ? 'Update Data' : 'Create Data' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="form-group">
                            <label>
                                No of Days
                            </label>
                            <input type="number" class="form-control" wire:model="no_of_days" placeholder="No of Days" min="0" id="num"
                                >
                            @error('no_of_days')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="form-group">
                            <label>
                                Amount
                            </label>
                            <input type="number" class="form-control" wire:model="amount" placeholder="Amount" min="0" id="amt"
                                >
                            @error('amount')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" wire:click="closeModel"
                            class="btn btn-danger m-t-15 waves-effect">Close </button>
                        <button type="button" wire:click="saveData"
                            class="btn btn-success m-t-15 waves-effect">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--end model--}}
    {{-- delete model here --}}
    <div wire:ignore.self class="modal fade" id="delete-model" tabindex="-1" role="dialog"
    aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="formModal">Warning!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">
                    If you want to remove this data, <b>you can't undo</b>, It will be affected that relevant
                    records!
                </p>

                <div class="text-right">
                    <button type="button" wire:click="deleteCloseModel"
                        class="btn btn-success m-t-15 waves-effect">No </button>
                    <button type="button" wire:click="deleteRecord"
                        class="btn btn-danger m-t-15 waves-effect">Yes</button>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- model end --}}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#formOpen").click(function() {
            $("#div3").fadeIn(500);
        });

        $("#formClose").click(function() {
            $("#div3").fadeOut();
        });
        $('#amt').on('keyup', function() {
            let amt = $("#amt").val();
            if (amt < 1) {
                $("#amt").val("");
            }

        });
        $('#num').on('keyup', function() {
            let num = $("#num").val();
            if (num < 1) {
                $("#num").val("");
            }

        });
    });
    
</script>