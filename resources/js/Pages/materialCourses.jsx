import React from "react";

const materialCourse = ({material}) =>{






    if(material.type == 'material')
    {
        return material.map(x => <button className="block w-full p-2 bg-blue-300 rounded mb-2 font-bold" onClick={()=> { onClick(x.link) }}>{x.name}</button>)
    }
    else
    {
        return <div></div>;
    }

}


export default materialCourse;