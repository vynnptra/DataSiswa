<div class="flex flex-col justify-center min-h-screen" style=" margin-right: 15rem">
  <div>
    <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
      <div class="page-content">
        <div class="transition-all duration-150 container-fluid" id="page_layout">
          <div id="content_layout">
            <div class="card xl:col-span-2">
              <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                  <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                  </div>
                </header>
                <div class="card-text h-full">
                  {{ $slot }}
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>