<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full " role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Name course:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Name" wire:model.defer="name_EN">
                            @error('name_EN') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Spanish name course:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Name in spanish" wire:model.defer="name_ES">
                            @error('name_ES') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Image link:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter link image course" wire:model.defer="image">
                            @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Author course:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter name author course" wire:model.defer="author">
                            @error('author') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>


                        <input id="material" type="hidden" wire:model.defer="material">
                        @error('material') <span class="text-red-500">{{ $message }}</span>@enderror
                        <div id="courseContainer">
                        </div>

                        <div class="mb-4">
                            <button type="button" id="addMaterial" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded my-3">+ Add Material</button>
                            <button type="button" id="addQuiz" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded my-3">+ Add Quiz</button>
                        </div>
                        
                        {{-- <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Material course:</label>
                            <textarea rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="test material" wire:model="material"></textarea>
                            @error('material') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div> --}}

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <button id="btnSubmitWire" class="hidden" wire:click.prevent="store()" type="button"></button>

                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button id="btnSubmit" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Save
                        </button>

                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const addMaterial = document.querySelector('#addMaterial');
    const addQuiz = document.querySelector('#addQuiz');

    const btnSubmit = document.querySelector('#btnSubmit');
    
    const templateMaterial = `<div class="material bg-gray-200 rounded p-3 mt-2">
        <a href="javascript: void(0);" style="float:right;font-size:1.1em;">x</a>
        <div class="mb-4 mt-1">
            <label class="block text-gray-700 text-sm font-bold mb-2">Material name:</label>
            <input txtLabel type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Material name" required>
        </div>
        <div class="mb-4 mt-1">
            <label class="block text-gray-700 text-sm font-bold mb-2">Material link:</label>
            <input txtLabel type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="material link (pdf, video) required">
        </div>        
    </div>
`;

    const materialObject = {};

    addMaterial.addEventListener('click',() =>{
        // creando la seccion del curso
        let containerMaterial = document.createElement('div');
        containerMaterial.innerHTML = templateMaterial;
        document.querySelector('#courseContainer').append(containerMaterial);

        const materials = document.querySelectorAll('div.material');

        const material = materials[materials.length - 1];

        material.children[0].addEventListener('click',(e) =>{
            e.currentTarget.parentElement.parentElement.remove();
        });

    });

    btnSubmit.addEventListener('click',() =>{

        let materialJson = collectMaterial();

        let m = document.querySelector('#material');
        m.value = materialJson;

        let ev = new Event('input', {bubles:true, cancelable: true});
        m.dispatchEvent(ev);

        document.querySelector('#btnSubmitWire').click();
    });


    function collectMaterial()
    {
        let materialConfig = [];
        const materials = document.querySelectorAll('div.material');
        materials.forEach(e =>{
            
            let material ={
                name: e.children[1].children[1].value,
                link: e.children[2].children[1].value
            };

            materialConfig = [...materialConfig,material];
        });

        console.log(materialConfig);
        
        return JSON.stringify(materialConfig);
    }

    function renderMaterial()
    {
        const stringJson = document.querySelector('#material').value;
        const objJson = JSON.parse(stringJson);

        console.log(objJson);
    }


</script>