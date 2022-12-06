
import React, { useState } from "react";

import axios from 'axios';

import {DndProvider} from "react-dnd"
import {HTML5Backend} from 'react-dnd-html5-backend'


import { Album } from "./components/Album";
import { MinhasFigurinhas } from "./components/MinhasFigurinhas";

function App() {
  const [figurinhas, setFigurinhas] = useState([
    { id: 1, pos: 1, name: "Ronaldo" },
    { id: 3, pos: 1, name: "Ronaldo" },
    { id: 2, pos: 3, name: "Rivaldo" },
  ]);

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