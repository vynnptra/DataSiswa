<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
    <div class="page-content">
      <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">




          <div class="mb-5">
            <ul class="m-0 p-0 list-none">
              <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                <a href="index.html">
                  <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                  <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
              </li>
              <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                Components
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Card</li>
            </ul>
          </div>
            <div class="card">
                <div class="card-body rounded-md bg-white dark:bg-slate-800 shadow-base">
                  <div class="items-center p-5">
                    {{ $slot }}
                    <a href="{{ $redirect }}" class="btn inline-flex justify-center bg-slate-900 text-slate-50 dark:bg-slate-900 dark:text-slate-300">cancel</a>
                  </div>
                </div>
          </div>