<x-dropdown>
                    <x-slot name='trigger'>
                       
                    <button  class='py-2 pl-3 pr-2 text-sm font-semibold text-left flex  bg-gray-100 rounded-xl'>
                        Welcome, {{auth()->user()->username}}
                        
                        <x-icon name='down-arrow' class=' pointer-events-none '  
                            style="right: 1px;"/>
                       
                    </button>
                    

                    </x-slot>
                   
                    @admin
                    <x-dropdown-item href="/admin/posts" :active='request()->is("admin/posts")' >
                            All Posts
                        </x-dropdown-item> 
                     <x-dropdown-item href="/admin/posts/create"  :active='request()->is("admin/posts/create")'>
                            New Post
                        </x-dropdown-item>
                    @endadmin
                    
                        <x-dropdown-item href="#" x-data={} @click.prevent="document.querySelector('#logout-form').submit()">
                            Log Out
                        </x-dropdown-item>

                        <form action="/logout" id="logout-form"method='POST' class='hidden' >
                    @csrf

                </form>
                
                </x-dropdown>