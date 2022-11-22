import React, {useState, useEffect} from 'react';

const Contador = ({segundos}) => {
    return (
      <span> {segundos}</span>
    );
}

/* function getRandom(array) {
  
  const index = Math.floor(Math.random() * array.length);
  
  return array[index];
  
}

async function getFigurinhas(){
  
  const req = await fetch('/api/figurinhas');
  
  return await req.json();
  
}

const figurinhas = getFigurinhas();
var compradas = [];

function comprar(){
  
  for(var i = 0; i < 5; i++){
    
    compradas.push(getRandom(figurinhas));;
    
  }
  
} */

export const Loja = () => {
  
  const [contagem, setContagem] = useState(0);
  
  useEffect(() => {
    if(contagem > 0 ){
      setTimeout(() => setContagem(contagem - 1), 1000);
    }
  }, [contagem]);
  
  const comprar = () => {
    setContagem(30);
  }
  
  return (
    <>
      <p>Compre mais em: 
        <Contador segundos={contagem}/>
      </p>
      <button onClick={comprar} disabled={contagem > 0} className="btn btn-info">Comprar</button>
    </>
  )
}