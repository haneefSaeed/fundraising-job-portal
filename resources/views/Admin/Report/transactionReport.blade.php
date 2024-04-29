<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>

</head>
<body>
    <h1>Transaction Report</h1>

    <div class="table-responsive text-nowrap">
        <table id="trans_table" class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Type</th>
                <th>Category</th>
                <th>Posted By</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Posted Date</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$transaction->trans_title}}</strong></td>
                    <td>
                        {{substr($transaction->trans_description, 0, 100)}}
                    </td>
                    <td>{{$transaction->trans_type}}</td>
                    <td>{{$transaction->category->cat_name}}</td>
                    <td>{{$transaction->user->name}}</td>
                    <td>{{$transaction->trans_date}}</td>
                    <td>{{$transaction->trans_amount}}</td>
                    <td>
                        @if($transaction->trans_status == 0)
                            <span class="badge bg-label-primary me-1">draft</span>
                        @elseif($transaction->trans_status == 1)
                            <span class="badge bg-label-success me-1">Approved</span>
                        @else
                            <span class="badge bg-label-danger me-1">Canceled</span>
                        @endif
                    </td>
                    <td>{{$transaction->created_at}}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td><strong>The Total Sum: </strong></td>
                <td><strong>{{$transactions->where('trans_type', '=', 'Income')->sum('trans_amount') - $transactions->where('trans_type', '=', 'Expense')->sum('trans_amount')}}</strong></td>
            </tr>
            </tbody>
        </table>
    </div>
</body>
</html>