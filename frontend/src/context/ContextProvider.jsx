import { createContext, useState, useContext } from "react";

const ContextState = createContext({
    documents: [],
    setDocument: () => { }
})

export const ContextProvider = ({ children }) => {
    const [
        documents,
        setDocuments
    ] = useState();

    <ContextState.Provider value={{
        documents,
        setDocuments
    }}>
        {children}
    </ContextState.Provider>
}

const useContextState = () => {
    return useContext(ContextState);
}