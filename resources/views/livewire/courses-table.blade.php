<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
    @if (session()->has('message'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
        <div class="flex">
            <div>
                <p class="text-sm">{{ session('message') }}</p>
            </div>
        </div>
    </div>
    @endif
    <button onclick="create()"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Course</button>

    <table class="table-fixed w-full">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Spanish Name</th>
                <th class="px-4 py-2">Author</th>
                <th class="px-4 py-2">Created at</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @if (empty($courses) || $courses->count() == 0)
                <div class="bg-teal-100 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">You do not have courses created.</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach($courses as $course)
                <tr>
                    <td class="border px-4 py-2">{{ $course->id }}</td>
                    <td class="border px-4 py-2">{{ $course->name_EN }}</td>
                    <td class="border px-4 py-2">{{ $course->name_ES }}</td>
                    <td class="border px-4 py-2">{{ $course->author }}</td>
                    <td class="border px-4 py-2">{{ $course->created_at->diffForHumans() }}</td>
                    <td class="border px-4 py-2">
                        <button onclick="render('{{ route('admin-courses').'/'.$course->id }}')"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                        <button wire:click="delete({{ $course->id }})"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <br>
    {{ $courses->links() }}

    <div id="modal" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 hidden">
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
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nameEN" placeholder="Enter Name" wire:model.defer="name_EN">
                                @error('name_EN') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Spanish name course:</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nameES" placeholder="Enter Name in spanish" wire:model.defer="name_ES">
                                @error('name_ES') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
    
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Image link:</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" placeholder="Enter link image course" wire:model.defer="image">
                                @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
    
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Author course:</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="author" placeholder="Enter name author course" wire:model.defer="author">
                                @error('author') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
    
    
                            <input id="material" type="hidden" wire:model.defer="material">
                            <input id="id" type="hidden" wire:model.defer="course_id">
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
                            <button onclick="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
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

        const nameEN = document.querySelector('#nameEN');
        const nameES = document.querySelector('#nameES');
        const image = document.querySelector('#image');
        const author = document.querySelector('#author');
        const material = document.querySelector('#material');
        
        const templateMaterial = `<div class="material-quiz material bg-gray-200 rounded p-3 mt-2">
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

        const templateQuiz = `<div class="material-quiz quiz bg-gray-200 rounded p-3 mt-2">
            <a href="javascript: void(0);" style="float:right;font-size:1.1em;">x</a>
            <div class="mb-4 mt-1">
                <label class="block text-gray-700 text-sm font-bold mb-2">Quiz name:</label>
                <input txtLabel type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Quiz name" required>
            </div>
            <div class="mb-4 mt-1">
                <button id="addQuestion" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                + Add Question
                </button>    
            </div>        
        </div>
    `;

    const templateQuestionQuiz = `<div class="question bg-gray-400 rounded p-3 mt-2">
            <a href="javascript: void(0);" style="float:right;font-size:1.1em;">x</a>
            <div class="mb-4 mt-1">
                <label class="block text-gray-700 text-sm font-bold mb-2">Question name:</label>
                <input txtLabel type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Quiestion name" required>
            </div>
            <div class="mb-4 mt-1">
                <button id="addAnswer" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                + Add Answer
                </button>    
            </div>        
        </div>
    `;

    const templateAnswer = `
<div txtOption class="answer flex-grow relative mb-1 mx-2">
    <input inpOption class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="New answer"/>
    <a class="absolute inset-y-0 right-0 flex items-center px-4 font-bold text-white bg-gray-600 rounded-r-lg hover:bg-gray-500 focus:bg-gray-700 cursor-pointer">x</a>
</div>
<label class="inline-flex items-center">
        <input type="checkbox" class="form-checkbox text-green-500">
        <span class="ml-2">correct answer</span>
</label>
`;

    const openModal = () => document.querySelector('#modal').classList.remove('hidden');
    const closeModal = () => document.querySelector('#modal').classList.add('hidden');

    const validateInputEmpty = (cad) => cad.value.length>0;
 
    const resetFields = (form) =>{
        const {nameEN, nameES, image, author,material} = form;

        nameEN.value = '';
        nameES.value = '';
        image.value = '';
        author.value = '';
        material.value = '';
    }

    const fillInputs = (inputs) =>{
        const {id,name_EN, name_ES, image, author, material} = inputs;
        document.querySelector('#id').value = id;
        document.querySelector('#nameEN').value = name_EN;
        document.querySelector('#nameES').value = name_ES;
        document.querySelector('#image').value = image;
        document.querySelector('#author').value = author;
        document.querySelector('#material').value = material;
    }

    const create = () =>{
        openModal();
        resetFields({nameEN, nameES, image, author,material});
        document.querySelector('#id').value = '';
        document.querySelector('#courseContainer').innerHTML = '';

    }
    const eventMaterialQuiz = (element,template, callback = undefined) =>{

            // creando la seccion del curso
            let containerMaterial = document.createElement('div');
            containerMaterial.innerHTML = template;
            document.querySelector('#courseContainer').append(containerMaterial);
    
            const materials = document.querySelectorAll(`div.${element}`);
    
            const material = materials[materials.length - 1];
    
            if(callback) callback(material);

            material.children[0].addEventListener('click',(e) =>{
                e.currentTarget.parentElement.parentElement.remove();
            });
        
    }

    const createQuizAnswer = (question) =>{

        const element = document.createElement('div');
        element.classList.add('flex');
        element.innerHTML = templateAnswer;
        
        question.insertBefore(element,question.children[question.children.length-1]);

        const answers = document.querySelectorAll('div.answer');

        const answer = answers[answers.length - 1];

        answer.children[1].addEventListener('click', (e) => {
            e.currentTarget.parentElement.parentElement.remove();
        });

    }

    const createQuizQuestion = (parentContent) =>{

        // console.log(parentContent);
        const element = document.createElement('div');
        element.innerHTML= templateQuestionQuiz;

        parentContent.insertBefore(element,parentContent.children[ parentContent.children.length - 1 ]);

        const questions = document.querySelectorAll('div.question');
        // console.log(questions);

        const question = questions[questions.length - 1];

        question.children[2].children[0].addEventListener('click', () => createQuizAnswer(question));

        question.children[0].addEventListener('click',(e) =>{
                e.currentTarget.parentElement.parentElement.remove();
            });
    }

    const createQuizEvent = (materials) =>{

        materials.children[2].children[0].addEventListener('click',() => createQuizQuestion(materials));
    }

    addMaterial.addEventListener('click',() => eventMaterialQuiz('material',templateMaterial));
    addQuiz.addEventListener('click',() => eventMaterialQuiz('quiz',templateQuiz,createQuizEvent));
    
        btnSubmit.addEventListener('click',() =>{

            if(validateInputEmpty(nameEN) && validateInputEmpty(nameES) && validateInputEmpty(author) && validateInputEmpty(image))
            {
                let materialJson = collectMaterial();
        
                let m = document.querySelector('#material');
                m.value = materialJson;
        
                let ev = new Event('input', {bubles:true, cancelable: true});
                m.dispatchEvent(ev);

                let idEv = new Event('input', {bubles:true, cancelable: true});
                let id = document.querySelector('#id');
                id.dispatchEvent(idEv);

                let nameEnEv = new Event('input', {bubles:true, cancelable: true});
                const nameEN = document.querySelector('#nameEN');
                nameEN.dispatchEvent(nameEnEv);

                let nameEsEv = new Event('input', {bubles:true, cancelable: true});
                const nameES = document.querySelector('#nameES');
                nameES.dispatchEvent(nameEsEv);
                
                
                let imageEv = new Event('input', {bubles:true, cancelable: true});
                const image = document.querySelector('#image');
                image.dispatchEvent(imageEv);

                let authorEv = new Event('input', {bubles:true, cancelable: true});
                const author = document.querySelector('#author');
                author.dispatchEvent(authorEv);


                document.querySelector('#btnSubmitWire').click();
            }
        });
    
    
        function collectMaterial()
        {
            let materialConfig = [];
            // const materials = document.querySelectorAll('div.material');
            const materials = document.querySelectorAll('div.material-quiz');
            materials.forEach(e =>{
                if(e.classList.contains('material'))
                {
                    let material ={
                        type: 'material',
                        name: e.children[1].children[1].value,
                        link: e.children[2].children[1].value,
                    };
        
                    materialConfig = [...materialConfig,material];
                }
                else if(e.classList.contains('quiz'))
                {
                    let quiz = {
                        type: 'quiz',
                        name: e.children[1].children[1].value
                    };
                    
                    // Obtener preguntas
                    let quizElement = e.children;

                    let questionIterator = 1;
                    for(let i = 2; i<quizElement.length-1; i++)
                    {
                        //obtener respuestas
                       let questionElement = quizElement[i].children[0].children;
                    //    console.log(questionElement);

                       quiz['question'+questionIterator]= {
                           questionName: questionElement[1].children[1].value,
                       };

                       let responseIterator = 1;
                       for(let j = 2; j<questionElement.length-1; j++)
                       {
                           quiz['question'+questionIterator]['response'+responseIterator] = {
                               response: questionElement[j].children[0].children[0].value,
                               checked: questionElement[j].children[1].children[0].checked,
                           };
                           responseIterator++;
                        //    console.log(questionElement[j]);
                       }
                       responseIterator = 1;
                       questionIterator++;

                       
                    }
                    questionIterator = 1;

                    // console.log(quiz);
                    materialConfig = [...materialConfig, quiz];
                }
            });
    
            console.log(materialConfig);
            
            return JSON.stringify(materialConfig);
        }

        const renderMaterial = (e) => {
            let containerMaterial = document.createElement('div');
                                containerMaterial.innerHTML = `<div class="material bg-gray-200 rounded p-3 mt-2">
                        <a href="javascript: void(0);" style="float:right;font-size:1.1em;">x</a>
                        <div class="mb-4 mt-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Material name:</label>
                            <input txtLabel type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Material name" value="${e.name}" required>
                        </div>
                        <div class="mb-4 mt-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Material link:</label>
                            <input txtLabel type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="material link (pdf, video)" value="${e.link}" required>
                        </div>        
                    </div>
                `;
                                // console.log(containerMaterial);
                                document.querySelector('#courseContainer').append(containerMaterial);
                        
                                const materials = document.querySelectorAll('div.material');
                        
                                const material = materials[materials.length - 1];
                        
                                material.children[0].addEventListener('click',(e) =>{
                                    e.currentTarget.parentElement.parentElement.remove();
                                });
        }

        const renderAnswer = (e,question) =>{
            console.log(e);

            for (const key in e) {
                if (e[key].hasOwnProperty('response')) {
                    
                    const element = document.createElement('div');
                    element.classList.add('flex');
                    element.innerHTML = `
            <div txtOption class="answer flex-grow relative mb-1 mx-2">
                <input inpOption class="w-full h-10 pl-3 pr-8 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="New answer" value= "${e[key].response}"/>
                <a class="absolute inset-y-0 right-0 flex items-center px-4 font-bold text-white bg-gray-600 rounded-r-lg hover:bg-gray-500 focus:bg-gray-700 cursor-pointer">x</a>
            </div>
            <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-green-500" ${(e[key].checked)?"checked":""}>
                    <span class="ml-2">correct answer</span>
            </label>
            `;
                    
                    question.insertBefore(element,question.children[question.children.length-1]);
        
                    const answers = document.querySelectorAll('div.answer');
        
                    const answer = answers[answers.length - 1];
        
                    answer.children[1].addEventListener('click', (e) => {
                        e.currentTarget.parentElement.parentElement.remove();
                    });
                }
            }
        }

        const renderQuizQuestion = (e,quizElement) =>{
            createQuizEvent(quizElement);

            for (const key in e) {
                if(e[key].hasOwnProperty('questionName'))
                {
                    const element = document.createElement('div');
                    element.innerHTML= `<div class="question bg-gray-400 rounded p-3 mt-2">
                    <a href="javascript: void(0);" style="float:right;font-size:1.1em;">x</a>
                    <div class="mb-4 mt-1">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Question name:</label>
                        <input txtLabel type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Quiestion name" value="${e[key].questionName}" required>
                    </div>
                    <div class="mb-4 mt-1">
                        <button id="addAnswer" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        + Add Answer
                        </button>    
                    </div>        
                </div>
            `;
        
                    quizElement.insertBefore(element,quizElement.children[ quizElement.children.length - 1 ]);
        
                    const questions = document.querySelectorAll('div.question');
                    // console.log(questions);
        
                    const question = questions[questions.length - 1];

                    question.children[2].children[0].addEventListener('click', () => createQuizAnswer(question));
        
                    question.children[0].addEventListener('click',(e) =>{
                            e.currentTarget.parentElement.parentElement.remove();
                        });

                    renderAnswer(e[key],question);

                }
            }
        }

        // Crear render quiz
        const renderQuiz = (e) =>{
            console.log(e);
            // creando la seccion del quiz
            let containerMaterial = document.createElement('div');
            containerMaterial.innerHTML = `<div class="material-quiz quiz bg-gray-200 rounded p-3 mt-2">
            <a href="javascript: void(0);" style="float:right;font-size:1.1em;">x</a>
            <div class="mb-4 mt-1">
                <label class="block text-gray-700 text-sm font-bold mb-2">Quiz name:</label>
                <input txtLabel type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Quiz name" required value="${e.name}">
            </div>
            <div class="mb-4 mt-1">
                <button id="addQuestion" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                + Add Question
                </button>    
            </div>        
        </div>
    `;
            document.querySelector('#courseContainer').append(containerMaterial);
    
            const quizs = document.querySelectorAll(`div.quiz`);
    
            const quiz = quizs[quizs.length - 1];
    
            renderQuizQuestion(e,quiz);

            quiz.children[0].addEventListener('click',(e) =>{
                e.currentTarget.parentElement.parentElement.remove();
            });
        }
    
        function render($route)
        {
                openModal();
                fetch($route)
                    .then(response => response.json())
                    .then(response =>{
                        console.log(response);
                        fillInputs(response[0]);
                        return JSON.parse(response[0].material);
                    })
                    .then(response => {
                        console.log(response);
                        document.querySelector('#courseContainer').innerHTML='';
                        
                        response.forEach(e =>{

                                if(e.type === 'material')
                                    renderMaterial(e);
                                else if(e.type === 'quiz')
                                    renderQuiz(e);
                        });
                        
                    });
    
        }
    
    </script>
</div>