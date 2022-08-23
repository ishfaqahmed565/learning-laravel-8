@auth
                       <form action="/posts/{{$post->slug}}/comments" method="POST" >
                            @csrf
                            <header class='flex items-center'>
                                
                                <img src="https://i.pravatar.cc/60/img={{auth()->id()}}" alt="" width='40' height='40' class='rounded-full'>
                                <h2 class='ml-4'>
                                    Want to participate?
                                </h2>
                            </header>
                            
                            <div class='mt-6'>
                                <textarea name="body" id="" class='w-full rounded-xl p-2 text-sm focus:outline-none focus:ring 'cols="30" rows="5" placeholder='Quick, think of something to say!' required></textarea>
                                @error('body') 
                                    <p class='text-red-500 text-xm mt-2'>{{$message}}</p>
                                @endError
                            </div>
                            
                            <div class = 'flex justify-end mt-6 pt-6 border-t border-gray-200'>
                                <button type='submit' class='bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600'>
                                    Submit
                                </button>
                            </div>
                            
                        </form>
                        @else
                        <p><a href="/login" class='hover:underline font-semibold'>Login</a> or <a href="/register" class='hover:underline font-semibold'>Register</a> to leave a comment</p>
                       @endauth