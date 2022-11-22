@extends('backend.layouts.app')
@section('title','Daftar Penggunaan Energi Tahunan')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="javascript:history.back()" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Energi Tahunan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="/energi-usage">Daftar Penggunaan Energi</a></div>
            <div class="breadcrumb-item">Tahunan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header pb-0">
                <h4>Daftar Penggunaan Energi Bulanan</h4>
            </div>
            <div class="card-body p-2">
                @if ($usage->IsNotEmpty())
                <table id="dataTable" class="table table-striped table-borderless responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usage as $key=>$data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data->year}}</td>
                            <td>
                                <a href="{{route('energi_usage.month', ['id'=>$data->post_by, 'year'=>$data->year])}}"
                                    class="table-action btn btn-primary
                                    mr-2" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>
                                    <a class="table-action btn btn-primary mr-2"
                                    href="{{route('energy.exportall', ['id'=>$data->post_by,'year'=>$data->year])}}" target="_blank"><i class="ri-download-line"></i>
                                    Unduh Bukti</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="align-items-center bg-light p-3 border-secondary rounded">
                    <span class="">Oops!</span><br>
                    <p><i class="fas fa-info-circle"></i> Belum Terdapat Data Infrastruktur</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
{{-- @include('backend.infrastruktur.modal') --}}
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            responsive: true
        });

        $(document).on('click', '.delete-btn', function () {
            var sid = $(this).val();
            $('#deleteModal').modal('show')
            $('#delete_id').val(sid)
            // alert(sid)
        });
    });

</script>
@endpush
