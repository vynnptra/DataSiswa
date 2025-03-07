
@extends('layouts.app')

@section('content')

   <x-table>


       <x-slot:title>
           Siswa
       </x-slot:title>
       <x-slot:create>
       {{  route('siswa.create') }}
       </x-slot:create>

       <thead class=" bg-slate-200 dark:bg-slate-700">
           <tr>
             <th scope="col" class=" table-th ">
               No
             </th>

             <th scope="col" class=" table-th " >
               Name
             </th>
             <th scope="col" class=" table-th " >
               Nisn
             </th>
             <th scope="col" class=" table-th " >
               Telepone
             </th>
             <th scope="col" class=" table-th " >
               Hobbies
             </th>

             <th scope="col" class=" table-th " >
               Action
             </th>

           </tr>
         </thead>
         <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
           
             @foreach ($siswas as $key => $siswa)
                 
             <tr>
                 <td class="table-td">{{ $key + 1 }}</td>
                 <td class="table-td " style="width: 25%">{{ $siswa->nama }}</td>
                 <td class="table-td ">{{ !empty($siswa->nisn->nisn) ? $siswa->nisn->nisn : 'tidak memiliki nisn' }}</td>
                 <td class="table-td ">    {{ $siswa->phoneNumbers->isNotEmpty() ? $siswa->phoneNumbers->pluck('phone_number')->implode(', ') : 'tidak memiliki nomor telepon' }}</td>
                 <td class="table-td ">    {{ $siswa->hobbies->isNotEmpty() ? $siswa->hobbies->pluck('name')->implode(', ') : 'tidak memiliki hobby'}}</td>
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
                               <a  href="{{ route('siswa.show', $siswa->id) }}" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                       dark:hover:text-white">
                                 View</a>
                             </li>
                             <li>
                               <a href="{{ route('siswa.edit', $siswa->id) }}" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                       dark:hover:text-white">
                                 Edit</a>
                             </li>
                             <li>
                             <form action="{{ route('siswa.destroy', $siswa->id) }}" method="post">
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
               </tr>
             @endforeach
         </tbody>

   </x-table>

@endsection
