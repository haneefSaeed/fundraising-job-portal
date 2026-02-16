
@if($myfrs != null && $myfrs->count() > 0)
<div class="overflow-x-auto">
    <table id="myFundraisingsTable" class="min-w-full divide-y divide-gray-200 rounded-lg shadow-sm">
        <thead class="bg-gray-100">
            <tr>
                
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Title</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Category</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Posting Date</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Closing Date</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Goal</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Raised</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Viewed</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Donors</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Status</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($myfrs as $fr)
            <tr>
                <td class="px-4 py-2 text-sm text-blue-600 hover:underline">
                    <a href="{{URL::route('profile.posteddonations', encrypt($fr->id))}}">{{$fr->cause_title}}</a>
                </td>
                <td class="px-4 py-2 text-sm text-gray-700">
                    {{App\Models\categories::find($fr->cause_cat_id)->cat_name ?? 'N/A'}}
                </td>
                <td class="px-4 py-2 text-sm text-gray-700">{{$fr->cause_start_date}}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{$fr->cause_end_date}}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{$fr->cause_goal}}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{App\Models\donations::where('cause_id', $fr->id)->sum('amount')}}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{$fr->seenctr}}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{App\Models\donations::where('cause_id', $fr->id)->distinct()->count()}}</td>
                <td class="px-4 py-2 text-sm">
                    @if($fr->cause_status == 0)
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Pending</span>
                    @elseif($fr->cause_status == 1)
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Running</span>
                    @elseif($fr->cause_status == 2)
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Ended</span>
                    @endif
                </td>
                <td class="px-4 py-2 text-sm space-x-1">
                    <a href="{{URL::route('profile.posteddonations', encrypt($fr->id))}}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-xs"><i class="fa fa-eye"></i></a>

                    @if($fr->cause_status != 2)
                    <button class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-xs btn-adf{{$fr->id}}" data-bs-toggle="modal" onclick="$('#causeId').val($('.btn-adf{{$fr->id}}').val());" data-bs-target="#FollowUpModel" value="{{$fr->id}}">
                        <i class="fa fa-newspaper-o" title="Add Follow Up"></i>
                    </button>

                    <button onclick="ConfirmDelete({{$fr->id}})" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs"><i class="fa fa-close" title="Delete"></i></button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@else
<h5 class="text-gray-700">You have posted no Fundraisings yet, Click <a href="{{route('c.create')}}" class="text-blue-600 hover:underline">Here</a> to start Now!!!</h5>
@endif

<!-- DataTables Scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myFundraisingsTable').DataTable({
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            order: [[0, 'desc']] // default order by S/N descending
        });
    });
</script>
