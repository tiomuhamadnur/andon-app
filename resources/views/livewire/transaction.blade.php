<div wire:poll>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                            NO
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
                            PIC DEPARTMENT
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
                            RESPONSE DURATION
                        </th>
                        <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                            PERFORMANCE DURATION
                        </th>
                        <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-wrap">
                            TOTAL DURATION
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            STATUS
                        </th>
                        <th class="text-secondary opacity-7"></th>
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
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ $item->device->line->name ?? '-' }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-xs text-secondary mb-0 font-weight-bold">
                                    {{ $item->device->process->name ?? '-' }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ $item->department->name ?? '-' }}
                                </span>
                            </td>
                            <td class="align-middle text-center text-wrap">
                                <span class="text-secondary text-xs py-0 my-0 font-weight-bold">
                                    {{ $item->call_at ?? '-' }}
                                </span>
                            </td>
                            <td class="align-middle text-center text-wrap">
                                <span class="text-secondary text-xs py-0 my-0 font-weight-bold">
                                    {{ $item->response_at ?? '-' }}
                                </span>
                            </td>
                            <td class="align-middle text-center text-wrap">
                                <span class="text-secondary text-xs py-0 my-0 font-weight-bold">
                                    {{ $item->closed_at ?? '-' }}
                                </span>
                            </td>
                            <td class="align-middle text-center text-wrap">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ $item->response_duration }} min
                                </span>
                            </td>
                            <td class="align-middle text-center text-wrap">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ $item->performance_duration }} min
                                </span>
                            </td>
                            <td class="align-middle text-center text-wrap">
                                <span class="text-secondary text-xs font-weight-bold">
                                    {{ $item->total_duration }} min
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <h6 class="mb-0 text-center">
                                    <span
                                        class="badge badge-lg @if ($item->status == 'Call') bg-danger @elseif ($item->status == 'Response') bg-warning
                                                                @else
                                                                bg-dark @endif  p-1">{{ $item->status }}</span>
                                </h6>
                            </td>
                            <td class="align-middle text-center">
                                <button type="button" class="btn btn-warning btn-link my-0 p-1"
                                    @if ($item->status != 'Call') hidden @endif data-bs-toggle="modal"
                                    data-bs-target="#confirmationResponse" data-id="{{ $item->id }}"
                                    title="Response">
                                    <i class="material-icons">phone</i>
                                    <div class="ripple-container"></div>
                                </button>
                                <a class="btn btn-success btn-link my-0 p-1"
                                    @if ($item->status != 'Response') hidden @endif href=""
                                    data-original-title="" title="Closed" data-bs-toggle="modal"
                                    data-bs-target="#confirmationClosed" data-id="{{ $item->id }}">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
