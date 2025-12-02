<footer {{ $attributes->class(['app-footer']) }}> <!--begin::To the end-->

    <div class="float-end d-none d-sm-inline" style="font-size: .8rem">


    </div> <!--end::To the end--> <!--begin::Copyright-->
    <div>
        @php($year = \Carbon\Carbon::now()->format("Y"))



    </div>
</footer> <!--end::Footer-->
