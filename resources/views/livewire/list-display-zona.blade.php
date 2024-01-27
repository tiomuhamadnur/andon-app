<div wire:poll.10000ms>
    <div class="card-body px-0 pb-2" style="background-color: white">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                            NO
                        </th>
                        <th class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                            ZONE
                        </th>
                        <th class="text-center text-uppercase text-dark text-large font-weight-bolder opacity-7">
                            PROCESS
                        </th>
                        <th
                            class="text-center text-uppercase text-dark text-large font-weight-bolder opacity-7 text-wrap">
                            CALL
                        </th>
                        <th class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                            STATE
                        </th>
                        <th class="text-uppercase text-center text-dark text-large font-weight-bolder opacity-7">
                            TIME
                        </th>
                    </tr>
                </thead>

                <tbody style="background-color: black">
                    @foreach ($transactions as $item)
                        <tr
                            class="@if ($item->status == 'Call') flashing-card-machine
                                @if ($item->department->id == 1) flashing-card-machine
                                @elseif ($item->department->id == 2) flashing-card-quality
                                @elseif ($item->department->id == 3) flashing-card-material
                                @elseif ($item->department->id == 4) flashing-card-spv @endif
@else
@endif">
                            <td class="align-middle text-center">
                                <span class="text-large white font-weight-bold">
                                    {{ $loop->iteration }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-uppercase text-large white font-weight-bold">
                                    {{ $item->device->zona->name ?? '-' }}
                                </span>
                            </td>
                            <td class="text-uppercase align-middle text-center">
                                <span class=" text-large white font-weight-bold">
                                    {{ $item->device->process->name ?? '-' }}
                                </span>
                            </td>
                            <td class="text-uppercase align-middle text-center">
                                <span class=" text-large white font-weight-bold">
                                    {{ $item->department->name ?? '-' }}
                                </span>
                            </td>
                            <td class="text-uppercase align-middle text-center">
                                <span class=" text-large white font-weight-bold">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="text-uppercase align-middle text-center">
                                <span class="text-large white mb-0 font-weight-bold">
                                    @if ($item->status == 'Call')
                                        {{ \Carbon\Carbon::parse($item->call_at)->format('H:i:s') }}
                                    @elseif ($item->status == 'Response')
                                        {{ \Carbon\Carbon::parse($item->response_at)->format('H:i:s') }}
                                    @elseif ($item->status == 'Pending')
                                        {{ \Carbon\Carbon::parse($item->response_at)->format('H:i:s') }}
                                    @elseif ($item->status == 'Closed')
                                        {{ \Carbon\Carbon::parse($item->closed_at)->format('H:i:s') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($item->call_at)->format('H:i:s') }}
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    @if ($transactions->count() == 0)
                        <tr class="bg-success">
                            <td colspan="6">
                                <p
                                    class="text-white text-large fw-bolder text-center text-uppercase align-items-center">
                                    Everything is good!
                                </p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
