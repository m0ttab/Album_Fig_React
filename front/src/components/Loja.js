import axios from "axios";
import React, { useState, useEffect } from "react";

const Contador = ({ segundos }) => {
  return <span> {segundos}</span>;
};

/* function getRandom(array) {
  
  const index = Math.floor(Math.random() * array.length);
  
  return array[index];
  
}



const figurinhas = getFigurinhas();
var compradas = [];

function comprar(){
  
  for(var i = 0; i < 5; i++){
    
    compradas.push(getRandom(figurinhas));;
    
  }
  
} */

var response;

async function getFigurinhas(){
  const req = await fetch("http://127.0.0.1:8000/api/figurinhas");

  response = await req.json();
}

getFigurinhas();

export const Loja = () => {
  const [contagem, setContagem] = useState(0);
  // const [figurinhas, setFigurinhas] = useState([]);

  useEffect(() => {
    if (contagem > 0) {
      setTimeout(() => setContagem(contagem - 1), 1000);
    }
  }, [contagem]);

  const comprar = async () => {
    setContagem(30);

    const req = await axios.get("http://127.0.0.1:8000/comprar");

    // setFigurinhas([...figurinhas, response])
  };

  return (
    <>
      <p>
        Compre mais em:
        <Contador segundos={contagem} />
      </p>
      <button
        onClick={comprar}
        disabled={contagem > 0}
        className="btn btn-success"
      >
        Comprar
      </button>
      {/* {figurinhas.map((f) => f.nome)} */}
    </>
  );
};
