<!-- Page Header -->
<div class="mb-5 flex items-center justify-between gap-4 max-sm:flex-wrap">
    <!-- Title -->
    <div class="grid gap-1.5">
        <div class="shimmer h-6 w-[150px]"></div>
    </div>

    <!-- Back Button and Export Button -->
    <div class="flex items-center gap-1.5">
        <div class="shimmer h-[39px] w-[65px] rounded-md"></div>
        <div class="shimmer h-[39px] w-[104px] rounded-md"></div>
    </div>
</div>

<div class="mb-5 flex items-center justify-between gap-4 max-sm:flex-wrap">
    <!-- Channel and Day Filter -->
    <div class="flex items-center gap-x-1">
        <div class="shimmer h-[38px] w-[164px] rounded-md"></div>
        <div class="shimmer h-[39px] w-[88px] rounded-md"></div>
    </div>

    <!-- Date Filters -->
    <div class="flex items-center gap-1.5">
        <div class="shimmer h-[39px] w-[140px] rounded-md"></div>
        <div class="shimmer h-[39px] w-[140px] rounded-md"></div>
    </div>
</div>

<div class="table-responsive box-shadow grid w-full overflow-hidden rounded bg-white dark:bg-gray-900">
    <x-admin::shimmer.datagrid.table.head />

    <x-admin::shimmer.datagrid.table.body />
</div>