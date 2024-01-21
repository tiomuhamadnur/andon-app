<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </head>

    <body>
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                        NO
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        STATUS
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        TICKET NUMBER
                    </th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                        BUILDING
                    </th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                        ZONA
                    </th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                        LINE
                    </th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                        PROCESS
                    </th>
                    <th
                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                        ISSUE
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        CALL AT
                    </th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                        RESPONSE AT
                    </th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                        CLOSED AT
                    </th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                        RESPONSE DURATION (Minutes)
                    </th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                        PERFORMANCE DURATION (Minutes)
                    </th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                        TOTAL DURATION (Minutes)
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        PIC
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        AFFECTED EQUIPMENT
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        PHOTO BEFORE
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        PHOTO AFTER
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        REMARK
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                    <tr>
                        <td class="text-center">
                            <div class="d-flex flex-column justify-content-center">
                                <p class="mb-0 text-sm">{{ $loop->iteration }}</p>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <h6 class="mb-0 text-center">
                                <span>{{ $item->status }}</span>
                            </h6>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->ticket_number ?? '-' }}
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->device->building->name ?? '-' }}
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->device->zona->name ?? '-' }}
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <p class="text-xs text-secondary mb-0 font-weight-bold">
                                {{ $item->device->line->name ?? '-' }}
                            </p>
                        </td>
                        <td class="align-middle text-center">
                            <p class="text-xs text-secondary mb-0 font-weight-bold">
                                {{ $item->device->process->name ?? '-' }}
                            </p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->department->name ?? '-' }}
                            </span>
                        </td>
                        <td class="align-middle text-center text-wrap">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->call_at ?? '-' }}
                            </span>
                        </td>
                        <td class="align-middle text-center text-wrap">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->response_at ?? '-' }}
                            </span>
                        </td>
                        <td class="align-middle text-center text-wrap">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->closed_at ?? '-' }}
                            </span>
                        </td>
                        <td class="align-middle text-center text-wrap">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->response_duration }}
                            </span>
                        </td>
                        <td class="align-middle text-center text-wrap">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->performance_duration }}
                            </span>
                        </td>
                        <td class="align-middle text-center text-wrap">
                            <span class="text-secondary text-xs font-weight-bold">
                                {{ $item->total_duration }}
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <h6 class="mb-0 text-center">
                                <span>{{ $item->pic->name ?? '' }}</span>
                            </h6>
                        </td>
                        <td class="align-middle text-center">
                            <h6 class="mb-0 text-center">
                                <span>{{ $item->equipment->name ?? '' }}</span>
                            </h6>
                        </td>
                        <td>
                            @if ($item->photo != null)
                                {{ asset('storage/' . $item->photo) }}
                            @else
                            @endif
                        </td>
                        <td>
                            @if ($item->photo_closed != null)
                                {{ asset('storage/' . $item->photo_closed) }}
                            @else
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            <h6 class="mb-0 text-center">
                                <span>{{ $item->remark ?? '' }}</span>
                            </h6>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
