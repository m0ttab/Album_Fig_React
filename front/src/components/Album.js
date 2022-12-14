import axios from "axios";
import { useEffect, useState } from "react";
import { Local } from "./Local";

export const Album = ({ colaFigurinha }) => {

  const [album, setAlbum] = useState([]);

  useEffect(()=>{
    const fun = async () => {
       const r = await axios.get("http://127.0.0.1:8000/api/album")

       setAlbum(r.data)
    }

    fun();
  },[])


  useEffect(() => {
     console.log(album)
  },[album])

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
