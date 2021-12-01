import React from "react";
import { useState,useEffect } from "react";



const Quiz = ({quiz}) =>{

    const quizArray = Object.entries(quiz);
    console.log(quiz);

    return (<div>
            {
                quizArray.map(([key,value]) =>{

                    if(key == 'name')
                    {
                        return <h3 key={key} className="pt-3 text-center text-gray-900">{value}</h3>;
                    }
                    else if(key.includes('question'))
                    {

                        return Object.entries(value).reverse().map(([key,value]) =>{
                            if(key.includes('questionName'))
                            {
                                return <h5 key={key} className="pt-4 px-2">{value}</h5>
                            }
                            else if(key.includes('response'))
                            {
                                console.log("key",key);
                                console.log("value",value);
                                return(
                                    <div className="mx-4 mb-3">
                                        <label className="inline-flex items-center">
                                            <input type="radio" className="form-radio" name="test" value={value['cheked']}/>
                                            <span className="ml-2">{value['response']}</span>
                                        </label>
                                    </div>);
                            }
                        })
                    }
                    
                })
            }
            </div>
    );
}


export default Quiz;