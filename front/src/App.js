import React, { useEffect, useState } from "react";

import axios from "axios";

import { DndProvider } from "react-dnd";
import { HTML5Backend } from "react-dnd-html5-backend";

import { Album } from "./components/Album";
import { MinhasFigurinhas } from "./components/MinhasFigurinhas";

function App() {
  const [figurinhas, setFigurinhas] = useState([]);

  useEffect(() => {
    const fun = async () => {
      const r = await axios.get("http://127.0.0.1:8000/api/compradas");

      setFigurinhas(r.data) 
    };
    fun();
  }, []);

  const colaFigurinha = (id) =>
    setFigurinhas((p) => p.filter((f) => f.id !== id));

  return (
    <DndProvider backend={HTML5Backend}>
      <div className="App" style={{ display: "flex" }}>
        <MinhasFigurinhas figurinhas={figurinhas} />
        <Album colaFigurinha={colaFigurinha} />
      </div>
    </DndProvider>
  );
}

export default App;
