import React from "react";
import { useDrop } from "react-dnd";
import { TYPES } from "./types";

export const Local = ({ local, setAlbum, colaFigurinha }) => {

  const [{backgroundColor}, dropRef] = useDrop(() => ({
    accept: TYPES.FIGURINHA,
    drop: (item) => {
      colaFigurinha(item.id)
      setAlbum(album => album.map(
          p => p.pos === item.pos ? {...p, f:item}:p
      ))
    },
    canDrop: (item) => !local.f && item.pos === local.pos,
    collect: (monitor) => ({
      backgroundColor: monitor.isOver() ?'black':'white'
    })
  }), [local.f])

  return (
    <div ref={dropRef} style={{
      backgroundColor, 
      border: "solid 1px blue",
      width: "60px",
      height: "80px",
      padding: "30px",
      margin: "15px",
    }}>
      {local.f?.name}
    </div>
  );
};
