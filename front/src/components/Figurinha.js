import React from "react";
import { useDrag } from "react-dnd";
import { TYPES } from "./types";

export const Figurinha = ({ f }) => {

  const [{isDragging, backgroundColor}, dragRef] = useDrag(() => ({
    type: TYPES.FIGURINHA,
    item: f,
    collect: (monitor) => ({
      isDragging: monitor.isDragging(),
      backgroundColor: monitor.isDragging() ? 'black': 'white'

    })
  }))

  console.log(isDragging)
  return (
    <div
      ref={dragRef}
      style={{
        border: "solid 1px red",
        width: "55px",
        height: "75px",
        backgroundColor
      }}
    >
      {f.name}
    </div>
  );
};
