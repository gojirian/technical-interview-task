export interface Comment {
    id: number;
    body: string;
    user_id: number | null;
    commentable_id: number;
    commentable_type: string;
    created_at: string;
    updated_at: string;
    user?: {
        id: number;
        name: string;
        email: string;
    };
}

export interface Task {
    id: number;
    title: string;
    description: string | null;
    status: string;
    created_at: string;
    updated_at: string;
    comments: Comment[];
}

export interface Page {
    id: number;
    title: string;
    description: string | null;
    content: string | null;
    created_at: string;
    updated_at: string;
}
