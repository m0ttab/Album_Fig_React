import { useState } from "react";
import { Local } from "./Local";

export const Album = ({ colaFigurinha }) => {

  const [album, setAlbum] = useState([
    { id: 1, pos: 1, f: null },
    { id: 2, pos: 2, f: { id: 3, pos: 2, name: "Cinza" } },
    { id: 3, pos: 3, f: null },
  ]);
  return (
    <div
      style={{
        display: "flex",
        border: "solid 1px green",
        width: "100%",
        height: "500px",
      }}
    >
      {album.map((local) => (
        <Local
          key={local.id}
          local={local}
          setAlbum={setAlbum}
          colaFigurinha={colaFigurinha}
        />
      ))}
    </div>
  );
};
