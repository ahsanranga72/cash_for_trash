@forelse ($items as $key => $item)
    <tr>
        <td class="align-middle text-center">{{ ($items->currentPage() - 1) * $items->perPage() + $key + 1 }}</td>
        <td class="align-middle text-center">
            <img alt="image" class="avatar avatar-md br-7"
                src="{{ asset('storage/users/profile_images/') }}/{{ $item['profile_image'] }}">
        </td>
        <td class="text-nowrap align-middle">{{ $item['first_name'] }}</td>
        <td class="text-nowrap align-middle">{{ $item['last_name'] }}</td>
        <td class="text-nowrap align-middle">{{ $item['email'] }}</td>
        <td class="text-nowrap align-middle">{{ $item['phone'] }}</td>
        <td class="text-center align-middle">
            <div class="g-2">
                <a class="btn text-danger btn-sm" href="javascript:void(0)" data-bs-toggle="tooltip"
                    data-bs-original-title="Delete" onclick="alert_function('delete-{{ $item['id'] }}')">
                    <span class="fe fe-trash-2 fs-14"></span></a>
                <form action="{{ route('admin.customer-destroy', $item['id']) }}" id="delete-{{ $item['id'] }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="text-center align-middle" style="padding: 3rem 0 !important;">
            Nothing to show !</td>
    </tr>
@endforelse
