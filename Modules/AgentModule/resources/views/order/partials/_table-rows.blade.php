@forelse ($items as $key => $item)
    <tr>
        <td class="align-middle text-center">{{ ($items->currentPage() - 1) * $items->perPage() + $key + 1 }}</td>
        <td class="text-nowrap align-middle">{{ $item->customer->first_name }}</td>
        <td class="text-nowrap align-middle">{{ $item->agent->user->first_name ?? 'N/A' }}</td>
        <td class="text-nowrap align-middle">{{ $item->status }}</td>
        <td class="text-center align-middle">
            <div class="g-2">
                <a class="btn text-primary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="Details"
                    href="{{ route('agent.order-show', $item['id']) }}"><span
                        class="fe fe-eye fs-14"></span></a>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center align-middle" style="padding: 3rem 0 !important;">
            Nothing to show !</td>
    </tr>
@endforelse
