export default async function Page() {
    const data = await fetch('http://localhost:8082/products')
    const posts = await data.json()
    return (
        <ul>
            {posts.map((post: any) => (
                <li key={post.id}>{post.title}</li>
            ))}
        </ul>
    )
}
