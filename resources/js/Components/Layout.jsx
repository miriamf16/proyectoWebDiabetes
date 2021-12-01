import React, { useEffect, useState } from "react";
import { InertiaLink } from "@inertiajs/inertia-react";
import { useTranslation } from 'react-i18next';
import { usePage } from "@inertiajs/inertia-react";

window.searchVal = '';

export default function Layout({ title, children }) {

    let [courses, setCourses] = useState([]);
    useEffect( async () => {
        document.title = title;

        const getCourses = async () =>{
            const result = await fetch('/courses');
            const response = await result.json();
            console.log(response);
            setCourses(response);
        }


        getCourses();
    }, [title]);

    const { t, i18n } = useTranslation(),
        {types, categories, loggedIn} = usePage().props,
        useTypes = !document.location.pathname.includes('/post/') && !document.location.pathname.includes('/survey/'),
        isCourses = document.location.pathname.includes('/courses');

    let [currentType , setcurrentType] = useState(types && types[0] ? types[0].name : '');
    document.CC = currentType;
    document.CCId = types[0].id;

    const changeLanguage = (event) => {
        i18n.changeLanguage(event.target.value)
    }

    const setCategory = (cat, cat_id) => {
        if (useTypes) {
            document.CCId = cat_id;
            document.changedCat(cat, cat_id);
            setcurrentType(cat);
        }
    };

    const logOut = function () {
        document.querySelector('a.btnLogout').click();
    };

    var setsearchVal = function (){
        window.searchVal = document.getElementById("SB")!=null?document.getElementById("SB").value : '';
    }

    var callOutBusqueda = function (){
        var URL = "http://www.google.com/search?q=";
        var value = document.getElementById("SB") !=null? document.getElementById("SB").value : [];
        var search = URL.concat(value); 
        window.open(search).focus();
    }

    return (
            <div className="custom-container">
                <nav className="navbar navbar-expand-lg navbar-light bg-light">
                    <div className="container-fluid">
                        <InertiaLink
                            className="navbar-brand"
                            href="\"
                        >
                            Come balanceado
                        </InertiaLink>
                        <button
                            className="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarNav"
                            aria-controls="navbarNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span className="navbar-toggler-icon"></span>
                        </button>
                        <div className="collapse navbar-collapse" id="navbarNav">
                            <ul className="navbar-nav me-auto">
                                {categories.map((c, i) => (
                                    <li className="nav-item" key={i}>
                                        <InertiaLink className={`nav-link ${document.location.pathname.includes(c.slug) ? 'active' : ''}`} href={`/Category/${c.slug}`}>
                                            <span className={i18n.language != 'en' ? 'hidden' : ''}>{c.EN_name}</span>
                                            <span className={i18n.language != 'es' ? 'hidden' : ''}>{c.ES_name}</span>
                                        </InertiaLink>
                                    </li>
                                ))}
                            </ul>
                            
                            <div className="navbar-nav me-auto">
                                <input className="inline-block mx-1" type="text" id="SB" placeholder={t('searchBar')} name="s"/>
                                <InertiaLink className="btn btn-sm btn-custom-light inline-block mx-1 pt-2" href={`/search/`} onClick={() =>setsearchVal()}>{t('search')}</InertiaLink>
                                <button type="submit" onClick={() =>callOutBusqueda()} className="btn btn-sm btn-custom-light inline-block mx-1">{t('searchGoogle')}</button>
                            </div>
                            
                            <section className="navbar-nav me-auto lang-section">
                                <h6>
                                    {loggedIn ? (
                                        <>
                                        <a href='/dashboard' className="text-sm text-gray-700 underline inline-block mx-2" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="inline bi bi-speedometer mr-2" viewBox="0 0 16 16">
                                            <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                            <path fillRule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                                        </svg> {t("dashboard")}
                                        </a>
                                        </>
                                    ) : (
                                        <>
                                        <a href='/dashboard' className="text-sm text-gray-700 underline inline-block mx-2" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="inline bi bi-speedometer mr-2" viewBox="0 0 16 16">
                                                <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                                <path fillRule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                                            </svg> {t("login")}
                                        </a>
                                        <a href="/register" className="text-sm text-gray-700 underline inline-block mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" className="inline bi bi-speedometer mr-2">
                                                <path d="M19.5 15c-2.483 0-4.5 2.015-4.5 4.5s2.017 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.017-4.5-4.5-4.5zm2.5 5h-2v2h-1v-2h-2v-1h2v-2h1v2h2v1zm-7.18 4h-14.815l-.005-1.241c0-2.52.199-3.975 3.178-4.663 3.365-.777 6.688-1.473 5.09-4.418-4.733-8.729-1.35-13.678 3.732-13.678 6.751 0 7.506 7.595 3.64 13.679-1.292 2.031-2.64 3.63-2.64 5.821 0 1.747.696 3.331 1.82 4.5z"/>
                                            </svg> {t("signup")}   
                                        </a> 
                                        </>

                                        
                                    )}

                                    {/* @if (Route::has('login'))
                                        @auth
                                            
                                        @else
                                            
                                            @if (Route::has('register'))
                                            @endif
                                        @endauth
                                    @endif */}
                                    <a
                                        className={i18n.language == 'en' ? 'active' : ''}
                                        onClick={()=>i18n.changeLanguage('en')}
                                    >
                                        En
                                    </a>
                                    |
                                    <a
                                        className={i18n.language == 'es' ? 'active' : ''}
                                        onClick={()=>i18n.changeLanguage('es')}
                                    >
                                        Es
                                    </a>
                                </h6>
                            </section>
                        </div>
                    </div>
                </nav>

                {useTypes ? 
                    <div className={`d-flex bg-light`} id="usrLevels">
                        {types.map(t => <div key={t.name} onClick={()=>setCategory(t.name, t.id)} className={(t.name === currentType ? 'selected' : '')}>
                            <p className={i18n.language != 'en' ? 'hidden' : ''}>{t.name}</p>
                            <p className={i18n.language != 'es' ? 'hidden' : ''}>{t.nameES}</p>
                        </div>)}
                    </div>
                : <></>}


                {children}

                {isCourses ?
                        <div className="py-12">
                        <div className="max-w-6xl mx-auto sm:px-6 lg:px-8">
                            <div className="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                { 
                        courses.map(x => (
                            <figure className="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
                                <img className="w-32 h-32 md:flex-1 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto md:mx-0 object-cover" src={x.image} alt="" width="384" height="512"/>
                                <div className="md:flex pt-6 md:p-8 text-center md:flex-auto md:justify-end md:text-left space-y-4">
                                    <div>
                                        <p className="text-lg font-semibold">
                                        {x.name_ES}
                                        </p>
                                        <figcaption className="font-medium mb-3">
                                            <div className="text-cyan-600">
                                            Author: {x.author}
                                            </div>
                                            <div className="text-gray-500">
                                            Created: {x.created_at.split('T')[0]}
                                            </div>
                                        </figcaption>
                                        <a className="inline-flex items-center h-8 px-3 py-2 text-base text-indigo-100 no-underline transition-colors duration-150 bg-blue-500 rounded-lg focus:shadow-outline hover:bg-blue-800" href={"./courses/"+x.id}>Join Course</a>
                                    </div>
                                </div>
                            </figure>
                        )) 
                        }</div></div></div>
                    :<></>
                }

                <footer className="bg-dark text-white text-center p-1">
                    <h1 className="">Health 101</h1>
                    {t("Contact")}
                     <p className="">Social Media: 
                        <a href="https://www.facebook.com/Comebalanceadouabc20-101021035158385">  &nbsp;Facebook Page  </a>
                        <a href="https://www.facebook.com/groups/413938496303058?_rdc=1&_rdr">    &nbsp;Facebook Group   </a>
                    </p>
                    <div className="mt-3 footer-links d-flex flex-column flex-md-row">
                        {/* <InertiaLink>Privacy</InertiaLink>
                        <InertiaLink>Terms of Service</InertiaLink>
                        <InertiaLink>Ad Choices</InertiaLink>
                        <InertiaLink>Web Accessibility</InertiaLink> */}
                    </div>
                    <InertiaLink className="btn btn-sm btn-custom-light" href={`/subscription/`} >Subscribe</InertiaLink>
                </footer>
            </div>
    );
}
