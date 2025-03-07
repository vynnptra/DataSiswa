


<div>
    <div class="flex flex-col justify-between min-h-screen">
        <div>
          <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
            <div class="page-content">
              <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">
                  <!-- BEGIN: Breadcrumb -->
                  <div class="mb-5">
                    <ul class="m-0 p-0 list-none">
                      <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                        <a href="index.html">
                          <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                          <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                        </a>
                      </li>
                      <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                        Pages
                        <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                      </li>
                      <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                        {{ $title }}-Table
                      </li>
                    </ul>
                  </div>
                  <!-- END: BreadCrumb -->
  
  
                  <div class=" space-y-5">
                    <div class="card">
                      <header class=" card-header noborder">
                        <h4 class="card-title">
                          {{ $title }} Table
                        </h4>
                        <a  href="{{ $create }}" class="text-blue-600 border border-blue-600 rounded-2xl dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                          dark:hover:text-white">
                                    Create</a>
                      </header>
                      <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto -mx-6 dashcode-data-table">
                          <span class=" col-span-8  hidden"></span>
                          <span class="  col-span-4 hidden"></span>
                          <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden ">
                              <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                     
                                {{ $slot }}
                              </table>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
</div>