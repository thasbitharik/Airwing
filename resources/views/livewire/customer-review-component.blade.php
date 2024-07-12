@push('customerreview', 'active')


<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-info text-white-all">
            <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i>Customer Review</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12 col-md-4">
        </div>

        <div class="col-12 col-md-8">

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="searchKey" wire:keyup="FetchData"
                        placeholder="Search Here..." aria-label="">
                    <div class="input-group-append">
                        <button class="btn search-btn" wire:click="FetchData">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12 col-md-12">
            <div class="card">
                <div class="p-4">
                    <h4>Customer Review</h4>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Customer</th>
                                <th>Title</th>
                                <th>Rating</th>
                                <th>Comments</th>
                                <th>Status</th>
                                <th>Approved By</th>
                                <th>Action</th>
                            </tr>
                            {{-- @php($x = 1) --}}
                            @foreach ($items as $row)
                            <tr class="text-center">
                                <td>{{ $items->firstItem() + $loop->iteration -1 }}</td>
                                <td>{{$row->customer_fname}}</td>
                                <td>{{$row->title}}</td>
                                <td class="rating">
                                    @for ($i = $row->rating; $i > 0; $i--)
                                    <i class="fa fa-star voted" style="color: #d9122b; font-size:13px" aria-hidden="true"></i>
                                    @endfor
                                </td>
                                <td class="p-2" style="max-width: 300px;
                                overflow: hidden;
                                word-wrap: break-word;">{{ $row->comments }}</td>
                                <td>
                                    @if($row->status==0)
                                    <button class="btn btn-sm btn-warning"
                                        wire:click="statusChangeModel('{{ $row->id }}','{{ $row->status }}')"> On
                                        Progree
                                    </button>
                                    @elseif($row->status==1)
                                    <button class="btn btn-sm btn-success"
                                        wire:click="statusChangeModel('{{ $row->id }}','{{ $row->status }}')"> Approved
                                    </button>
                                    @else
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="statusChangeModel('{{ $row->id }}','{{ $row->status }}')"> Rejected
                                    </button>
                                    @endif
                                </td>
                                <td>{{$row->approve_by}}</td>
                                <td>
                                    @if (in_array('Update', $page_action))
                                    <a href="#" class="text-info" wire:click="updateRecord({{ $row->id }})"><i
                                            class="fa fa-pen" aria-hidden="true"></i>
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
                    <h5 class="modal-title" id="formModal">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="form-group">
                            <label>
                                Approved By
                            </label>
                            <input type="text" class="form-control" wire:model="approveby" placeholder="Approved By">
                            @error('approveby')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" wire:click="closeModel" class="btn btn-danger m-t-15 waves-effect">Close
                        </button>
                        <button type="button" wire:click="saveData"
                            class="btn btn-success m-t-15 waves-effect">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--end model--}}
    {{-- status model here --}}
    <div wire:ignore.self class="modal fade" id="status-model" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="formModal">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" wire:model="status">
                                <option value="0" {{($status==0?"selected":"")}}>On Progress</option>
                                <option value="1" {{($status==1?"selected":"")}}>Approved</option>
                                <option value="2" {{($status==2?"selected":"")}}>Rejected</option>


                            </select>
                            @error('status')
                            <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" wire:click="closeStatusChangeModel"
                            class="btn btn-success m-t-15 waves-effect">No </button>
                        <button type="button" wire:click="saveStatusChangeModel"
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
    });
     // this is for admin status
     window.addEventListener('status-show-form', event => {
            $('#status-model').modal('show');
        });
        window.addEventListener('status-hide-form', event => {
            $('#status-model').modal('hide');
        });
</script>