import React from "react";
import { Figurinha } from "./Figurinha";

export const MinhasFigurinhas = ({ figurinhas }) => {
  return (
    <div style={{ display: "flex", flexDirection: "column", width: "60px" }}>
      {figurinhas.map((f) => (
        <Figurinha key={f.id} f={f} />
      ))}
    </div>
  );
};
