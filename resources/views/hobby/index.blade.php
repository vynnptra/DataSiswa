
 @extends('layouts.app')

 @section('content')

    <x-table>

        <x-slot:title>
            Hobbies
        </x-slot:title>
        <x-slot:create>
           {{ route('hobby.create') }}
          </x-slot:create>
   

        <thead class=" bg-slate-200 dark:bg-slate-700">
            <tr>
              <th scope="col" class=" table-th ">
                No
              </th>

              <th scope="col" class=" table-th " >
                Name
              </th>

              @if(auth()->user()->hasRole(['superadmin', 'admin']))
              <th scope="col" class=" table-th " >
                Action
              </th>
              @endif


            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
            
              @foreach ($hobbys as $key => $hobby)
                  
              <tr>
                  <td class="table-td">{{ $key + 1 }}</td>
                  <td class="table-td " style="width: 80%">{{ $hobby->name }}</td>
                  @if(auth()->user()->hasRole(['superadmin', 'admin']))
                  <td class="table-td ">
                      <div>
                        <div class="relative">
                          <div class="dropdown relative">
                            <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton40" data-bs-toggle="dropdown" aria-expanded="false">
                              <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                            </button>
                            <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                          shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                              <li>
                                <a  href="{{ route('hobby.show', $hobby->id) }}" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                                  View</a>
                              </li>
                              <li>
                                <a href="{{ route('hobby.edit', $hobby->id) }}" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                                  Edit</a>
                              </li>
                              <li>
                              <form action="{{ route('hobby.destroy', $hobby->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                          dark:hover:text-white">
                                    Delete</button>
                              </form>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </td>
                  @endif
                </tr>
              @endforeach
          </tbody>

    </x-table>

 @endsection
