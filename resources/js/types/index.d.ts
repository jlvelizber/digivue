export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export type Digimon = {
    id: number;
    name: string;
    image?: string;
    href?: string;
    xAntibody?: boolean;
    images?: any[];
    levels?: any[];
    types?: any[];
    attributes?: any[];
    fields?: any[];
}

export type Pagineable = {
    currentPage: number;
    elementsOnPage: number;
    totalElements: number;
    totalPages: number;
    previousPage: string;
    nextPage: string;
};

export type DigimonListPaginator = {
    content: Digimon[];
    pageable: Pagineable
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: User;
    };
   
};
