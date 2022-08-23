<x-layout>
 <x-setting :heading="'Edit Post: ' . $post->title ">
        <form method='POST' action='/admin/posts/{{$post->id}}'  class='mt-10' enctype='multipart/form-data' >

                @csrf
                @method('PATCH')
                <x-form.input name='title' :value="old('title', $post->title)" />
                <x-form.input name='slug' :value="old('slug', $post->slug)"/>
                <div class='flex  items-center flex-col sm:flex-row'>
                    <div>
                        <x-form.input name='thumbnail' type='file' :value="old('thumbnail',$post->thumbnail)" />
                    </div>
                    <div>

                        <img src="{{asset('storage/'. $post->thumbnail)}}" alt="" class="rounded-xl ml-6 " style="max-width:150px ; min-width:50px" >
                    </div>
                </div>

                <x-form.textarea name='excerpt' >{{old('excerpt', $post->excerpt)}}</x-form.textarea>
                <x-form.textarea name='body' :value="old('body', $post->body)" >{{old('body', $post->excerpt)}}</x-form.textarea>
                <x-form.field>
                                <x-form.label name='category'/>
                                
                                <select name="category_id" id="category_id" class='border border-gray-400
                                p-2 '>
                                    @foreach(\App\Models\Category::all() as $category)
                                    <option  value="{{$post->category_id}}" {{ old('category_id', $post->category_id) === $category->id?'selected':''}}>{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') 
                                    <p class='text-red-500 text-xm mt-2'>{{$message}}</p>
                                @endError
                </x-form.field>


                <x-form.button>
                    Update
                </x-form.button>

        </form>
 </x-setting>
</x-layout>