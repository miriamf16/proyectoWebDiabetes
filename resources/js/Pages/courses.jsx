import React,{useState} from "react";
import { useEffect } from "react";
import { useTranslation } from 'react-i18next';
import { usePage } from "@inertiajs/inertia-react";
import { InertiaLink } from "@inertiajs/inertia-react";
import Quiz from "../Components/quiz";

const Courses = () =>{

    const {course} = usePage().props;
    document.querySelector('#app').removeAttribute('data-page');
    const materialCourse = JSON.parse(course[0].material);
    // console.log(course[0]);
    console.log(materialCourse);
    const [item, setItem] = useState('');
    const [quiz, setQuiz] = useState({});

    const onClickMaterial = (item ='') =>{
        if(item.includes('view') && item.includes('drive.google'))
        {
            item = item.replace('view','preview');
        }
        setItem(item);
    }

    const onClickQuiz = (quizItem) =>{
        setItem('');
        setQuiz(quizItem);
    }

    useEffect(() => {
        document.title = 'Health 101 - '+course[0].name_EN;
    }, [item,quiz]);

    return (
        <div className="min-h-screen">
            <nav className="bg-white border-b border-gray-100">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-80">
                    <div className="flex justify-between h-16">
                        <div className="flex">
                            <div className="flex-shrink-0 flex items-center">
                            <InertiaLink className="navbar-brand text-gray-800" href="\">Come balanceado</InertiaLink>
                            </div>
                            <div className="hidden space-x-0 sm:-my-px sm:ml-10 sm:flex">
                                <a href="/dashboard" className="no-underline inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition">
                                    Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <header className="bg-white shadow">
                    <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 className="font-semibold text-xl text-gray-800 leading-tight text-center">{course[0].name_EN}</h2>
                    </div>
            </header>

            <main className="py-3">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <section className="grid grid-rows-1 grid-cols-1 md:grid-cols-course gap-2">
                            {item?
                                <iframe className="p-1 w-full min-h-80" src={item} frameBorder="0"></iframe>
                                :
                                (Object.keys(quiz).length>0)?
                                    <Quiz quiz={quiz}/>
                                :
                                <div className="p-1 w-full min-h-80">
                                    <h2 className="pt-4 text-center text-blue-500">Welcome to {course[0].name_EN} course</h2>
                                </div>
                                
                            }
                            <section className="bg-gray-100 p-2">
                                
                                {
                                    materialCourse.map((x) =>{

                                        if(x.type=='material')
                                        {
                                            return <button className="block w-full p-2 bg-gray-300 shadow-sm rounded mb-2 font-bold" onClick={()=> { onClickMaterial(x.link) }}>{x.name}</button>;
                                        }
                                        else
                                        {
                                            return <button className="block w-full p-2 bg-gray-300 shadow-sm rounded mb-2 font-bold" onClick={()=> { onClickQuiz(x) }}>{x.name}</button>;
                                        }
                                    })
                                }
                                
                                {/* <button className="block w-full p-2 bg-blue-300 rounded mb-2 font-bold" onClick={()=> { onClick("https://drive.google.com/file/d/1Dc3kigkaD4EkRBl1pjq7P3PjTSH6GeLR/view") }}>Prueba</button> */}
                            </section>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    );
}

export default Courses;