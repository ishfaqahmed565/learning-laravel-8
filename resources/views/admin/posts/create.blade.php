<x-layout>
 <x-setting heading='Publish Post'>
        <form method='POST' action='/admin/posts'  class='mt-10' enctype='multipart/form-data' >

                @csrf

                <x-form.input name='title' />
                <x-form.input name='slug' />
                <x-form.input name='thumbnail' type='file'/>
                <x-form.textarea name='excerpt' />
                <x-form.textarea name='body' />
                <x-form.field>
                                <x-form.label name='category'/>
                                <select name="category_id" id="category_id" class='border border-gray-400
                                p-2 '>
                                    @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}" {{ old('category_id') === $category->id?'selected':''}}>{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') 
                                    <p class='text-red-500 text-xm mt-2'>{{$message}}</p>
                                @endError
                </x-form.field>


                <x-form.button>
                    Publish
                </x-form.button>

        </form>
 </x-setting>
</x-layout>